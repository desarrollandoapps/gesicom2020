<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGisemillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gisemill', function (Blueprint $table) {
            $table->id();
            $table->string('seidsemi');
            $table->string('senombre');
            $table->string('seenldoc');
            $table->bigInteger('segruinv')->unsigned();
            $table->foreign('segruinv')->references('id')->on('gigruinv');
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
        Schema::dropIfExists('gisemill');
    }
}
