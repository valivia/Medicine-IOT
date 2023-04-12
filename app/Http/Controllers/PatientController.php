<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    private $validation = [
        'first_name' => ['required', 'min:2'],
        'last_name' => ['required', 'min:2'],
        'address' => ['required'],
        'birthday' => ['required'],
        'device_id' => ['required'],
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

        return redirect('/patient/' . $patient->id);
    }

    // single patient. return view 'pages/patient/show'
    public function show(Patient $patient)
    {
        return view("pages/patient/show", ["patient" => $patient]);
    }

    // return view
    public function edit(Patient $patient)
    {
        return view('pages/patient/edit', ["patient" => $patient]);
    }

    // put request
    public function update(Request $request, $patient)
    {
        $formFields = $request->validate($this->validation);

        if ($patient->user_id !== auth()->user()->id)
            return redirect("/login");

        $patient->update($formFields);

        return redirect('/patient/' . $patient->id);
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
