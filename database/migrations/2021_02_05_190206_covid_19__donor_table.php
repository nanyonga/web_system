<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Covid19DonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('covid_19_donor_table', function (Blueprint $table) {
            $table->bigIncrements('DonorId');
            $table->string('DonorName');
            $table->string('Amount');
            $table->string("Month");
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
        Schema::dropIfExists('covid_19_donor_table');
    }
}
