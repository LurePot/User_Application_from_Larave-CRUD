<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->bigInteger('upozila_id')->unsigned();
            $table->foreign('upozila_id')->references('id')->on('upozilas')->onDelete('cascade');
            $table->string('address');
            $table->string('language');
            $table->string('photo');
            $table->string('cv');
            $table->string('exam');
            $table->string('board');
            $table->string('year')->nullable();
            $table->string('cgpa')->nullable();
            $table->string('tname')->nullable();
            $table->string('tdetail')->nullable();
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
        Schema::dropIfExists('applicants');
    }
};
