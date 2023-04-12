<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Show list all patients of user
    public function index()
    {
        // fetch user -> patients with that user id
        
    }

    // return view
    public function create(): View
    {
        return view('pages/patient/create');
    }

    // post request. validate form and put in db with user id
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'address' => ['required'],
            'birthday' => ['required']
        ]);

        $formFields["user_id"] = auth()->user()->id;

        $patient = Patient::create($formFields);

        return redirect('/patient/' . $patient->id);
    }

    // single patient. return view 'pages/patient/show'
    public function show(Patient $patient)
    {
        // dd($patient);
        return view("pages/patient/show", [
            "patient" => $patient
        ]);
    }

    // return view
    public function edit($patient)
    {
        //
    }

    // put request
    public function update(Request $request, $patient)
    {
        //
    }

    // delete patient
    public function destroy($patient)
    {
        //
    }
}
