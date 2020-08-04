<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGidearausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gidearau', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dainvest')->unsigned();
            $table->foreign('dainvest')->references('id')->on('giinvest');
            $table->bigInteger('daartinv')->unsigned();
            $table->foreign('daartinv')->references('id')->on('giartinv');
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
        Schema::dropIfExists('gidearau');
    }
}
