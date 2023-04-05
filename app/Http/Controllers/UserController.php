<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;

class UserController extends Controller
{
    public function index($userId)
    {
        $user = User::find($userId);
        $patients = Patient::where('user_id', $userId)->get();

        return view("user.index", [
            "patients" => $patients,
            "user" => $user
        ]);
    }
}
