<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiponinvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giponinv', function (Blueprint $table) {
            $table->id();
            $table->string('pititulo');
            $table->string('pievento');
            $table->string('pifecini');
            $table->string('pifecfin');
            $table->string('pifecpon');
            $table->string('piciudad');
            $table->string('pipagweb')->nullable();
            $table->string('piambito');
            $table->bigInteger('piprovin')->unsigned();
            $table->foreign('piprovin')->references('id')->on('giproinv');
            $table->bigInteger('pilinvin')->unsigned();
            $table->foreign('pilinvin')->references('id')->on('gilininv');
            $table->bigInteger('picodtip')->unsigned();
            $table->foreign('picodtip')->references('id')->on('gitippon');
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
        Schema::dropIfExists('giponinv');
    }
}
