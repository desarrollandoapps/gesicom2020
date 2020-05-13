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
            $table->string('sitelfij');
            $table->string('sinumeip');
            $table->date('sifecnac');
            $table->string('sitipvin');
            $table->string('siantsen');
            $table->string('sigrafor');
            $table->string('sititulo');
            $table->string('siproyec');
            $table->string('siarecon');
            $table->string('sicering');
            $table->string('sititula');
            $table->string('sinumfic');
            $table->string('siinstru');
            $table->date('siterlec');
            $table->date('siterpro');
            $table->string('siambfor');
            $table->string('siprored');
            $table->string('siparred');
            $table->string('sicurinv');
            $table->string('siforpro');
            $table->bigInteger('sicapaci')->unsigned();
            $table->foreign('sicapaci')->references('id')->on('gicapsem');
            $table->bigInteger('sigruinv')->unsigned();
            $table->foreign('sigruinv')->references('id')->on('gigruinv');
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
            $table->dropForeign('giseminv_sicapaci_foreign');
            $table->dropForeign('giseminv_sigruinv_foreign');
        });
        Schema::dropIfExists('giseminv');
    }
}
