<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGidepaausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gidepaau', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dpinvest')->unsigned();
            $table->foreign('dpinvest')->references('id')->on('giinvest');
            $table->bigInteger('dppatinv')->unsigned();
            $table->foreign('dppatinv')->references('id')->on('gipatinv');
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
        Schema::dropIfExists('gidepaau');
    }
}
