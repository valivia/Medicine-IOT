<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers;

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
// Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {return view('patient');});
    Route::get('/login', function () {return view('login');});
    Route::get('/register', function () {return view('register');});
    route::get('/user/{id}', function($id){return response('user ' . $id);})->where('id', '[0-9]+');
    route::get('/user/{userId}', [UserController::class, 'index']);
    route::get('/patient/{id}', function($id){return response('patient ' . $id);})->where('id', '[0-9]+');
    route::get('/patient/{id}/medication', function($id){return response('medicatie ' . $id);})->where('id', '[0-9]+');
    route::get('/patient/{id}/timeslots', function($id){return response('timeslots ' . $id);})->where('id', '[0-9]+');
// });

// Link naar de draai functie die redirect naar '/'
route::get('/draai', [DraaiController::class, 'nu_draaien']);