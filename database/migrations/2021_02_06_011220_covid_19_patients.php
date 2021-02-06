<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Covid19Patients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('covid_19_patients', function (Blueprint $table) {
            $table->bigIncrements('PatientId');
            $table->string('PatientName');
            $table->string('PatientStatus')->default("alive");
            $table->string("OfficerId");
            $table->string("gender");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('covid_19_patients');

    }
}
