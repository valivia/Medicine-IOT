<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Timeslot;
use DateTime;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeviceController extends Controller
{

    public function index($id)
    {
        $patient = Patient::where("device_id", $id)->first();
        if (!$patient) return response(404);

        $shouldOpen = $this->should_open($patient);
        $patientInfo = [
            "should_seek" => $patient->should_seek,
            "should_refill" => $patient->should_refill,
            "rotate" => $this->rotate($patient),
        ];

        return Response()->json(array_merge($patientInfo, $shouldOpen));
    }

    private function should_open(Patient $patient)
    {
        $timeslots = $patient->timeslots->sort(
            function ($a, $b) {
                $aTime = new DateTime("{$a->day}-01-2023 {$a->hour}:{$a->minute}:00");
                $bTime = new DateTime("{$b->day}-01-2023 {$b->hour}:{$b->minute}:00");
                return $aTime <=> $bTime;
            }
        )->all();

        // Find the timeslot that matches the current time
        $current_index = -1;
        $max_index = count($timeslots) - 1;
        $should_open = false;


        $now = new DateTime();


        $timeslot = null;
        foreach ($timeslots as $t) {
            $tTime = new DateTime("{$t->day}-01-2023 {$t->hour}:{$t->minute}:00");
            $cTime = new DateTime("{$t->day}-01-2023 {$now->format('H:i')}:00");


            if ($tTime < $cTime) {
                $current_index++;
                continue;
            }

            if ($tTime == $cTime) {
                $timeslot = $t;
                break;
            }
        }



        // If there is no timeslot, return 404
        if ($timeslot) {
            $should_open = true;
            $timeslot->received = true;
            $timeslot->save();
        }

        // If there is a timeslot store that the device received the request

        return [
            "should_open" => $should_open,
            "current_index" => $current_index,
            "max_index" => $max_index,
        ];
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
}
