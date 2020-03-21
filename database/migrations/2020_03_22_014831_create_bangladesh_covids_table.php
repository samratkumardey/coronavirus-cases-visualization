<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangladeshCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangladesh_covids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->integer('covid_test')->default(0);
            $table->integer('positive')->default(0);
            $table->integer('home_quarantine')->default(0);
            $table->integer('home_quarantine_release')->default(0);
            $table->integer('govt_quarantine')->default(0);
            $table->integer('govt_quarantine_release')->default(0);
            $table->integer('isolation')->default(0);
            $table->integer('isolation_release')->default(0);
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
        Schema::dropIfExists('bangladesh_covids');
    }
}
