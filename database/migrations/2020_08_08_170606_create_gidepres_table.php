<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGidepresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gidepres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dpproinv')->unsigned();
            $table->foreign('dpproinv')->references('id')->on('giproinv');
            $table->bigInteger('dpproesp')->unsigned();
            $table->foreign('dpproesp')->references('id')->on('giproesp');
            $table->date('dpfecreg');
            $table->decimal('dpporava', 5, 2);
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
        Schema::dropIfExists('gidepres');
    }
}
