<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Timeslot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeviceController extends Controller
{
    public function should_open($id)
    {
        // Get the patient and timeslots
        $patient = Patient::where("device_id", $id)->first();
        if ($patient) return response(404);

        $timeslot = $patient->timeslots()->where("day", date("w"))->all();

        // Find the timeslot that matches the current time
        $timeslot;
        foreach ($timeslot as $t) {
            if ($t->hour == date("H") && $t->minute == date("i")) {
                $timeslot = $t;
                break;
            }
        }

        // If there is no timeslot, return 404
        if ($timeslot == null) {
            return response(204);
        }

        // If there is a timeslot store that the device received the request
        $timeslot->received = true;
        $timeslot->save();

        return response(200);
    }

    public function reset($id)
    {
        // Get the patient.
        $patient = Patient::where("device_id", $id)->first();

        // Reset all timeslots for the patient.
        Timeslot::where("patient_id", $patient->id)->update([
            "received" => false,
            "failed" => false
        ]);

        $patient->last_fill = now();

        return response(200);
    }

    
    public function index(Patient $patient)
    {
        return view('pages/devices/index', compact("devices"));
    }
}


