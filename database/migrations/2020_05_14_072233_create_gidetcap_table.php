<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGidetcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gidetcap', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dcsemill')->unsigned();
            $table->foreign('dcsemill')->references('id')->on('Giseminv');
            $table->bigInteger('dccapaci')->unsigned();
            $table->foreign('dccapaci')->references('id')->on('Gicapsem');
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
        Schema::table('gidetcap', function (Blueprint $table) {
            $table->dropForeign('gidetcap_dcsemill_foreign');
            $table->dropForeign('gidetcap_dccapaci_foreign');
        });
        Schema::dropIfExists('gidetcap');
    }
}
