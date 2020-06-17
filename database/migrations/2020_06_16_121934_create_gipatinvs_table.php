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
        Schema::create('gipatinv', function (Blueprint $table) {
            $table->id();
            $table->string('pinumrad');
            $table->date('pifecsol');
            $table->string('pititobr');
            $table->string('pinumreg');
            $table->bigInteger('piprovin')->unsigned();
            $table->foreign('piprovin')->references('id')->on('giproinv');
            $table->bigInteger('picodtip')->unsigned();
            $table->foreign('picodtip')->references('id')->on('gitippat');
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
        Schema::dropIfExists('gipatinv');
    }
}
