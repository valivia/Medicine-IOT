<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{

    private $validation = [
        'hour' => 'required|integer|min:0|max:23',
        'minute' => 'required|integer|min:0|max:59',
        'day' => 'required|integer|min:0|max:6',
    ];


    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient)
    {
        if ($patient->user_id !== auth()->user()->id)
            return redirect("/login");

        $timeslots = $patient->timeslots()->get();

        return view('pages/timeslot/index', compact(['patient', 'timeslots']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $patient)
    {
        return view('pages/timeslot/create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Patient $patient)
    {
        if ($patient->user_id !== auth()->user()->id)
            return redirect("/login");

        $request->validate($this->validation);

        $currentTimeslots = $patient->timeslots()->get();

        // check if reached limit.
        if ($currentTimeslots->count() >= 14) {
            return redirect(route('patient.timeslot.create', $patient))->with('error', 'Your device only supports 14 timeslots');
        }

        foreach ($currentTimeslots as $currentTimeslot) {
            $startTime = strtotime($currentTimeslot->day . ' ' . $currentTimeslot->hour . ':' . $currentTimeslot->minute . ':00');
            $endTime = strtotime('+1 hour', $startTime);

            $newStartTime = strtotime($request->day . ' ' . $request->hour . ':' . $request->minute . ':00');
            $newEndTime = strtotime('+1 hour', $newStartTime);

            $overlap = max(0, min($endTime, $newEndTime) - max($startTime, $newStartTime)) / 60; // calculate overlap in minutes

            if ($overlap >= 60) {
                return redirect(route('patient.timeslot.create', $patient))->with('error', 'Timeslot overlaps with existing timeslot');
            }
        }



        $timeslot = new Timeslot($request->all());
        $timeslot->patient()->associate($patient);
        $timeslot->save();

        return redirect(route('patient.timeslot.show', [$timeslot->patient, $timeslot]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient, Timeslot $timeslot)
    {
        return view('pages/timeslot/edit', compact(['patient', 'timeslot']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient, Timeslot $timeslot)
    {
        return view('pages/timeslot/edit', compact(['patient', 'timeslot']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient, Timeslot $timeslot)
    {
        if ($patient->user_id !== auth()->user()->id)
            return redirect("/login");

        $request->validate($this->validation);

        $timeslot->update($request->all());

        return redirect(route('patient.timeslot.show', [$timeslot->patient, $timeslot]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, Timeslot $timeslot)
    {
        if ($patient->user_id !== auth()->user()->id)
            return redirect("/login");

        $timeslot->delete();

        return redirect('/patient');
    }
}
