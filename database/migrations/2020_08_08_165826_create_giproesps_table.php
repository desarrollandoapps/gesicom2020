<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiproespsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giproesp', function (Blueprint $table) {
            $table->id();
            $table->string('petippro');
            $table->string('pedespro');
            $table->decimal('peporava', 5, 2)->default(0);
            $table->bigInteger('peproinv')->unsigned();
            $table->foreign('peproinv')->references('id')->on('giproinv');
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
        Schema::dropIfExists('giproesp');
    }
}
