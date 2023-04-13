<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    
    private $validation = [
        'name' => ['required'],
        'description',
        
    ];
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages/medication/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate($this->validation);

        $medication = Medication::create($formFields);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Medication $medication)
    {
        return view('pages/medication/show', compact("medication"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
