<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Timeslot;
use DateTime;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{

    private $validation = [
        'hour' => 'required|integer|min:0|max:23',
        'minute' => 'required|integer|min:0|max:59',
        'day' => 'required|integer|min:0|max:6',
        'medication_ids' => 'array',
        'medication_ids.*' => 'required|integer|exists:medications,id'
    ];


    // check if two timeslots are within 60 minutes of each other.
    private function within60Minutes(DateTime $dateTime1, DateTime $dateTime2)
    {
        $diff = abs($dateTime1->getTimestamp() - $dateTime2->getTimestamp());
        error_log($diff);
        return ($diff <= 3540); // 3600 seconds = 60 minutes
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient)
    {
        if ($patient->user_id !== auth()->user()->id)
            return redirect("/login");

        $timeslots = $patient->timeslots->sort(
            function ($a, $b) {
                $aTime = new DateTime("{$a->day}-01-2023 {$a->hour}:{$a->minute}:00");
                $bTime = new DateTime("{$b->day}-01-2023 {$b->hour}:{$b->minute}:00");
                return $aTime <=> $bTime;
            }
        )->map(function ($timeslot) {
            $timeslot->medicationCount = $timeslot->medicationCount();
            return $timeslot;
        });

        return view('pages/timeslot/index', compact(['patient', 'timeslots']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $patient)
    {
        $medications = $patient->medications;
        return view('pages/timeslot/create', compact('patient', "medications"));
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

        // check if timeslot overlaps with existing timeslot.
        foreach ($currentTimeslots as $timeslot) {
            $dateTime1 = new DateTime("{$timeslot->day}-01-2023 {$timeslot->hour}:{$timeslot->minute}:00");
            $dateTime2 = new DateTime("{$request->day}-01-2023 {$request->hour}:{$request->minute}:00");
            if ($this->within60Minutes($dateTime1, $dateTime2)) {
                return redirect(route('patient.timeslot.create', $patient))->with('error', 'Timeslot overlaps with existing timeslot');
            }
        }

        // add timeslot.
        $timeslot = new Timeslot($request->all());
        $timeslot->patient()->associate($patient);
        $timeslot->save();
        $timeslot->medications()->sync($request->medication_ids);

        return redirect(route('patient.timeslot.index', [$timeslot->patient, $timeslot]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient, Timeslot $timeslot)
    {
        $medications = $patient->medications;
        return view('pages/timeslot/edit', compact('patient', "timeslot", "medications"));
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
        $timeslot->medications()->sync($request->medication_ids);
        $timeslot->save();

        return redirect(route('patient.timeslot.index', [$patient, $timeslot]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, Timeslot $timeslot)
    {
        if ($patient->user_id !== auth()->user()->id)
            return redirect("/login");

        $timeslot->delete();

        return redirect(route('patient.timeslot.index', [$timeslot->patient, $timeslot]));
    }
}
