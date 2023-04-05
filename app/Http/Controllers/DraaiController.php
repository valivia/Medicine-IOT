<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Count;

class DraaiController extends Controller
{
    public function nu_draaien()
    {
        //hier komt de code voor het draaien
        
        // $draai->times_pressed += 1;
        // $count->save();

        return redirect('/');
    }
}
