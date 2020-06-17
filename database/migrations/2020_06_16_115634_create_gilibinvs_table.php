<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGilibinvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gilibinv', function (Blueprint $table) {
            $table->id();
            $table->string('linomlib');
            $table->bigInteger('linumpag')->unsigned();
            $table->bigInteger('lianopub')->unsigned();
            $table->bigInteger('limespub')->unsigned();
            $table->bigInteger('lidiapub')->unsigned();
            $table->string('lieditor');
            $table->string('liciupub');
            $table->string('limeddiv');
            $table->string('licoisbn');
            $table->string('lisitweb');
            $table->bigInteger('liprovin')->unsigned();
            $table->foreign('liprovin')->references('id')->on('giproinv');
            $table->bigInteger('licodtip')->unsigned();
            $table->foreign('licodtip')->references('id')->on('gitiplib');
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
        Schema::dropIfExists('gilibinv');
    }
}
