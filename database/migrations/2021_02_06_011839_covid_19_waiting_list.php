<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Covid19WaitingList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('waiting_list', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string("OfficerId");
            $table->string("OfficerUserName");
            $table->string("Pending")->default("no");
            $table->string('Award');
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
        Schema::dropIfExists('waiting_list');
    }
}
