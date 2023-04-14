<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\DeviceController;


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

Route::get('/', function () {
    return redirect('/login');
});

Route::get("/login", [UserController::class, "loginIndex"])->name("login");
Route::post("/login", [UserController::class, "login"]);

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

Route::get("/register", [UserController::class, "registerIndex"])->name("register");
Route::post("/register", [UserController::class, "register"]);

Route::resource("/user", UserController::class)->middleware("auth");
Route::resource("/patient", PatientController::class)->middleware("auth");
Route::resource("patient.timeslot", TimeslotController::class)->middleware("auth");
Route::resource("patient.medication", MedicationController::class)->middleware("auth");

Route::get("/device/{id}", [DeviceController::class, "index"]);
