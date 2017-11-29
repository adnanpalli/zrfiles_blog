<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDcoumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_dcouments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dp')->nullable();
            $table->string('iqama')->nullable();
            $table->string('passport_photo1')->nullable();
            $table->string('passport_photo2')->nullable();
            $table->string('passport_photo3')->nullable();
            $table->string('certificate')->nullable();
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
        Schema::dropIfExists('employee_dcouments');
    }
}
