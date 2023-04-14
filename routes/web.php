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

// ping every 5 seconds to see if should be ready to open
Route::get("/device/{id}/should_open", [DeviceController::class, "should_open"]);

// pings when the caretaker refills the box.
Route::get("/device/{id}/reset", [DeviceController::class, "reset"]);

// rotate
Route::get("/device/{id}/rotate", [DeviceController::class, "rotate"]);
Route::post("/device/{id}/rotate", [DeviceController::class, "set_rotate"]);

// seek
Route::get("/device/{id}/should_seek", [DeviceController::class, "should_seek"]);
Route::post("/device/{id}/should_seek", [DeviceController::class, "set_should_seek"]);

// refill
Route::get("/device/{id}/should_refill", [DeviceController::class, "should_refill"]);
Route::post("/device/{id}/should_refill", [DeviceController::class, "set_should_refill"]);
