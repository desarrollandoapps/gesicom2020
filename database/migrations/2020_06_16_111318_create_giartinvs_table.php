<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiartinvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giartinv', function (Blueprint $table) {
            $table->id();
            $table->string('aititulo');
            $table->bigInteger('aipagini')->unsigned();
            $table->bigInteger('aipagfin')->unsigned();
            $table->bigInteger('aianopub')->unsigned();
            $table->bigInteger('aimespub')->unsigned();
            $table->string('ainomrev');
            $table->string('aivolrev');
            $table->string('aiserrev');
            $table->string('aiciupub');
            $table->string('aimeddiv');
            $table->string('aicoissn');
            $table->string('aicoddoi');
            $table->string('aisitweb')->nullable();
            $table->bigInteger('aiprovin')->unsigned();
            $table->foreign('aiprovin')->references('id')->on('giproinv');
            $table->bigInteger('aicodtip')->unsigned();
            $table->foreign('aicodtip')->references('id')->on('gitipart');
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
        Schema::dropIfExists('giartinv');
    }
}
