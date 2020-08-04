<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGidepoausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gidepoau', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dpinvest')->unsigned();
            $table->foreign('dpinvest')->references('id')->on('giinvest');
            $table->bigInteger('dpponinv')->unsigned();
            $table->foreign('dpponinv')->references('id')->on('giponinv');
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
        Schema::dropIfExists('gidepoau');
    }
}
