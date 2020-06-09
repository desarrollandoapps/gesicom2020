<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGicenforTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gicenfor', function (Blueprint $table) {
            $table->id();
            $table->string('cfnombre');
            $table->bigInteger('cfregion')->unsigned();
            $table->foreign('cfregion')->references('id')->on('giregion');
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
        Schema::dropIfExists('gicenfor');
    }
}
