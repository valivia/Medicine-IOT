<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicatiansTimeslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicatians_timeslots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('dosage');

            $table->foreignId('medication_id')->constrained();
            $table->foreignId('timeslot_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicatians_timeslots');
    }
}
