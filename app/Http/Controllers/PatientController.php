<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{

    private $validation = [
        'first_name' => ['required', 'min:2'],
        'last_name' => ['required', 'min:2'],
        'address' => ['required'],
        'birthday' => ['required'],
        'device_id' => ['required', 'unique:patients'],
    ];

    // Show list all patients of user
    public function index()
    {
        $patients = Patient::where('user_id', auth()->user()->id)->get();

        return view('pages/patient/index', ["patients" => $patients]);
    }

    // return view
    public function create(): View
    {
        return view('pages/patient/create');
    }

    // post request. validate form and put in db with user id
    public function store(Request $request)
    {
        $formFields = $request->validate($this->validation);

        $formFields["user_id"] = auth()->user()->id;

        $patient = Patient::create($formFields);

        return redirect(route('patient.medication.index', $patient->id));
    }

    // return view
    public function edit(Patient $patient)
    {
        return view('pages/patient/edit', compact("patient"));
    }

    // put request
    public function update(Request $request, Patient $patient)
    {
        $validation = $this->validation;
        $validation['device_id'] = ['required', Rule::unique('patients', 'device_id')->ignore($patient->id)];

        $formFields = $request->validate($validation);

        if ($patient->user_id !== auth()->user()->id)
            return redirect("/login");

        $patient->update($formFields);

        return redirect(route('patient.medication.index', $patient->id));
    }

    // delete patient
    public function destroy(Patient $patient)
    {
        if ($patient->user_id !== auth()->user()->id)
            return redirect("/login");

        $patient->delete();

        return redirect('/patient');
    }
}
