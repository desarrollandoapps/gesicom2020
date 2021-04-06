<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigruinvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gigruinv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gicodgru')->unique();
            $table->string('giregpnd');
            $table->string('giregion');
            $table->string('gicenfor');
            $table->string('ginombre');
            $table->string('gimescre');
            $table->integer('gianocre');
            $table->string('gienldoc');
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
        Schema::dropIfExists('gigruinv');
    }
}
