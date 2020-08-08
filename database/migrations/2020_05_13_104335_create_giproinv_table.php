<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiproinvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giproinv', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('piregion')->unsigned();
            $table->foreign('piregion')->references('id')->on('giregion');
            $table->bigInteger('picenfor')->unsigned();
            $table->foreign('picenfor')->references('id')->on('gicenfor');
            $table->bigInteger('pigruinv')->unsigned();
            $table->foreign('pigruinv')->references('id')->on('gigruinv');
            $table->integer('pianofor');
            $table->string('pinompro');
            $table->string('pinumrad');
            $table->string('pienldri');
            $table->integer('pivalpre');
            $table->integer('pianoeje');
            $table->bigInteger('pilinpro')->unsigned();
            $table->foreign('pilinpro')->references('id')->on('gilinpro');
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
        Schema::table('giproinv', function (Blueprint $table) {
            $table->dropForeign('giproinv_pilinpro_foreign');
        });
        Schema::dropIfExists('giproinv');
    }
}
