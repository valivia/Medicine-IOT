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

Route::get("/login", [UserController::class, "loginIndex"])->name("login");
Route::post("/login", [UserController::class, "login"]);

Route::get("/register", [UserController::class, "registerIndex"])->name("register");
Route::post("/register", [UserController::class, "register"]);

Route::resource("/user", UserController::class)->middleware("auth");
Route::resource("/patient", PatientController::class)->middleware("auth");
Route::resource("/timeslot", TimeslotController::class)->middleware("auth");
Route::resource("/medication", MedicationController::class)->middleware("auth");

// ping every 5 seconds to see if should be ready to open
Route::get("/device/{id}/should_open", [DeviceController::class, "should_open"]);

// pings when the caretaker refills the box.
Route::get("/device/{id}/reset", [DeviceController::class, "reset"]);
