<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGisofinvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gisofinv', function (Blueprint $table) {
            $table->id();
            $table->string('sinumrad');
            $table->string('sifecrad');
            $table->string('sinumreg')->nullable([]);
            $table->string('sititobr');
            $table->string('siesttra');
            $table->bigInteger('siprovin')->unsigned();
            $table->foreign('siprovin')->references('id')->on('giproinv');
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
        Schema::dropIfExists('gisofinv');
    }
}
