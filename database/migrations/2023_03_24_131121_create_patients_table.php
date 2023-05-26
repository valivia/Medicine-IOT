<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('first_name');
            $table->string('last_name');
            $table->dateTime("birthday");
            $table->string("address");

            // Device controls.
            $table->boolean("should_seek")->default(false);
            $table->boolean("should_refill")->default(false);
            $table->dateTime("last_sensor")->nullable();
            $table->integer("rotate")->default(0);


            $table->string("device_id")->unique();
            $table->dateTime("last_fill")->nullable();

            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
