<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGidetinvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gidetinv', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('diinvest')->unsigned();
            $table->foreign('diinvest')->references('id')->on('giinvest');
            $table->bigInteger('diproinv')->unsigned();
            $table->foreign('diproinv')->references('id')->on('giproinv');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gidetinv');
    }
}
