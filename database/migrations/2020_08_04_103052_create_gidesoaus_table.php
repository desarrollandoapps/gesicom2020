<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGidesoausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gidesoau', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dsinvest')->unsigned();
            $table->foreign('dsinvest')->references('id')->on('giinvest');
            $table->bigInteger('dssofinv')->unsigned();
            $table->foreign('dssofinv')->references('id')->on('gisofinv');
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
        Schema::dropIfExists('gidesoau');
    }
}
