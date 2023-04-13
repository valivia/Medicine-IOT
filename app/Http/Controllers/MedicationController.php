<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\View\View;
use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{

    private $validation = [
        'name' => ['required'],
        'description' => [],
    ];


    public function index(Patient $patient)
    {
        $medications = Medication::where('patient_id', $patient->id)->get();

        return view('pages/medication/index', compact(["medications", "patient"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $patient): View
    {
        return view('pages/medication/create', compact("patient"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Patient $patient)
    {
        $formFields = $request->validate($this->validation);
        $formFields["patient_id"] = $patient->id;
        $medication = Medication::create($formFields);
        $medication->save();

        return redirect(route('patient.medication.index', $patient->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient, Medication $medication)
    {
        return view('pages/medication/show', compact("medication"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient, Medication $medication)
    {
        return view('pages/medication/edit', compact(["medication", "patient"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient, Medication $medication)
    {
        $formFields = $request->validate($this->validation);

        $medication->update($formFields);

        return redirect(route('patient.medication.index', $patient->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, Medication $medication)
    {
        //
    }
}
