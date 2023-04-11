<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $patients = Patient::where('user_id', $user->id)->get();

        return view("pages/user/show", [
            "patients" => $patients,
            "user" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("pages/user/edit", [
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function loginIndex()
    {
        return view("pages/login");
    }

    public function registerIndex()
    {
        return view("pages/register");
    }

    public function login()
    {
    }

    public function register()
    {
    }
}
