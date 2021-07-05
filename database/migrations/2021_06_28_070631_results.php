<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Results extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('tests');
            $table->bigInteger('request_id')->unsigned();
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');            $table->text('value',255);

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
    }
}
