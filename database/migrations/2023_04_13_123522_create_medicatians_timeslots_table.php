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
        Schema::create('medication_timeslot', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('dosage');

            $table->integer('timeslot_id')->unsigned();
            $table->integer('medication_id')->unsigned();
            $table->foreign('timeslot_id')->references('id')->on('timeslots')->onDelete('cascade');
            $table->foreign('medication_id')->references('id')->on('medications')->onDelete('cascade');
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
