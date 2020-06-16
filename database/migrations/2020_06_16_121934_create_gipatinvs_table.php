<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGipatinvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gipatinvs', function (Blueprint $table) {
            $table->id();
            $table->string('prcopare');
            $table->string('prnumrad');
            $table->date('prfecsol');
            $table->string('prtitobr');
            $table->string('prnumreg');
            $table->string('prespare');
            $table->bigInteger('prprovin')->unsigned();
            $table->foreign('prprovin')->references('id')->on('giproinv');
            $table->bigInteger('prcodtip')->unsigned();
            $table->foreign('prcodtip')->references('id')->on('gitippat');
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
        Schema::dropIfExists('gipatinvs');
    }
}
