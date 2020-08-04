<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGideliausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gideliau', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dlinvest')->unsigned();
            $table->foreign('dlinvest')->references('id')->on('giinvest');
            $table->bigInteger('dllibinv')->unsigned();
            $table->foreign('dllibinv')->references('id')->on('gilibinv');
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
        Schema::dropIfExists('gideliau');
    }
}
