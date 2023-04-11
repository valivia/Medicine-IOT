<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\MedicationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', function () {
    return view('pages/login');
});

Route::post('/login', [UserController::class, "login"]);


Route::get('/register', function () {
    return view('pages/register');
});
Route::post('/register', [UserController::class, "register"]);

Route::resource("/user", UserController::class);
Route::resource("/patient", PatientController::class);
Route::resource("/timeslot", TimeslotController::class);
Route::resource("/medication", MedicationController::class);
