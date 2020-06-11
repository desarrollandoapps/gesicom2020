<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGilininvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gilininv', function (Blueprint $table) {
            $table->id();
            $table->string('lideslin'); 
            $table->bigInteger('licodgru')->unsigned();
            $table->foreign('licodgru')->references('id')->on('gigruinv');
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
        Schema::dropIfExists('gilininv');
    }
}
