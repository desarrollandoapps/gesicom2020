<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGitraconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gitracon', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tcregion')->unsigned();
            $table->foreign('tcregion')->references('id')->on('giregion');
            $table->bigInteger('tccenfor')->unsigned();
            $table->foreign('tccenfor')->references('id')->on('gicenfor');
            $table->bigInteger('tcgruinv')->unsigned();
            $table->foreign('tcgruinv')->references('id')->on('gigruinv');
            $table->bigInteger('tclininv')->unsigned();
            $table->foreign('tclininv')->references('id')->on('gilininv');
            $table->string('tctitulo');
            // $table->bigInteger('tcaautpon');
            // $table->foreign('tcaautpon')->references('id')->on('giinvest');
            $table->string('tcevento');
            $table->string('tcfecini');
            $table->string('tcfecfin');
            $table->string('tcfecpon');
            $table->string('tcciudad');
            $table->string('tcpagweb')->nullable();
            $table->string('tcambito');
            $table->bigInteger('tcprovin')->unsigned();
            $table->foreign('tcprovin')->references('id')->on('giproinv');
            $table->bigInteger('tcprofor')->unsigned();
            $table->foreign('tcprofor')->references('id')->on('giprofor');
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
        Schema::dropIfExists('gitracon');
    }
}
