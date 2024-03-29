<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiseminvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giseminv', function (Blueprint $table) {
            $table->id();
            $table->string('sinombre');
            $table->string('sitipdoc');
            $table->string('sinumdoc');
            $table->date('sifecexp');
            $table->string('simunexp');
            $table->string('sirolsen');
            $table->string('siprofes');
            $table->string('sicorper');
            $table->string('sicorsen');
            $table->string('sinumcel');
            $table->string('sitelfij')->nullable();
            $table->string('sinumeip')->nullable();
            $table->date('sifecnac');
            $table->string('sitipvin');
            $table->string('siantsen');
            $table->string('sigrafor');
            $table->string('sititulo');
            $table->string('siproyec');
            $table->string('siarecon');
            $table->string('sititula');
            $table->string('sinumfic');
            $table->string('siinstru');
            $table->date('siterlec');
            $table->date('siterpro');
            $table->string('siambfor');
            $table->string('siprored')->nullable();
            $table->string('siparred');
            $table->string('sicurinv');
            $table->string('siniving');
            $table->string('siforpro');
            $table->bigInteger('sigruinv')->unsigned();
            $table->foreign('sigruinv')->references('id')->on('gigruinv');
            $table->bigInteger('sisemill')->unsigned();
            $table->foreign('sisemill')->references('id')->on('gisemill');
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
        Schema::table('giseminv', function (Blueprint $table) {
            $table->dropForeign('giseminv_sigruinv_foreign');
            $table->dropForeign('giseminv_sisemill_foreign');
        });
        Schema::dropIfExists('giseminv');
    }
}
