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


    // Seek
    public function should_seek($id)
    {
        // Get the patient.
        $patient = Patient::where("device_id", $id)->first();

        // If the patient should seek, return 200.
        if ($patient->should_seek) {
            $patient->should_seek = false;
            $patient->save();
            return response(200);
        }

        // If the patient should not seek, return 204.
        return response(204);
    }

    public function set_should_seek($id)
    {
        // Get the patient.
        $patient = Patient::where("device_id", $id)->first();

        // Set the patient to seek.
        $patient->should_seek = true;
        $patient->save();

        return redirect()->back();
    }

    // Refill

    public function should_refill($id)
    {
        // Get the patient.
        $patient = Patient::where("device_id", $id)->first();

        // If the patient should refill, return 200.
        if ($patient->should_refill) {
            $patient->should_refill = false;
            $patient->save();
            return response(200);
        }

        // If the patient should not refill, return 204.
        return response(204);
    }

    public function set_should_refill($id)
    {
        // Get the patient.
        $patient = Patient::where("device_id", $id)->first();

        // Set the patient to refill.
        $patient->should_refill = true;
        $patient->save();

        return redirect()->back();
    }

    // Rotate
    public function rotate($id)
    {
        // Get the patient.
        $patient = Patient::where("device_id", $id)->first();

        // If the patient should rotate, return 200.
        if ($patient->rotate != 0) {
            $direction = $patient->rotate;
            $patient->rotate = 0;
            $patient->save();
            return response($direction, 200);
        }

        // If the patient should not rotate, return 204.
        return response(204);
    }

    public function set_rotate($id, $direction)
    {
        // Get the patient.
        $patient = Patient::where("device_id", $id)->first();

        if ($direction != 1 && $direction != -1) {
            return response(400);
        }

        // Set the patient to rotate.
        $patient->rotate = $direction;
        $patient->save();

        return redirect()->back();
    }
}
