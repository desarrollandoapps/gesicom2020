<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GitraconGiinvest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giponinv_giinvest', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tiponinv')->unsigned();
            $table->foreign('tiponinv')->references('id')->on('giponinv');
            $table->bigInteger('tiinvest')->unsigned();
            $table->foreign('tiinvest')->references('id')->on('giinvest');
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
        Schema::dropIfExists('giponinv_giinvest');
    }
}
