<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiinvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giinvest', function (Blueprint $table) {
            $table->id();
            $table->string('innombre');
            $table->bigInteger('inregion')->unsigned();
            $table->foreign('inregion')->references('id')->on('giregion');
            $table->bigInteger('incenfor')->unsigned();
            $table->foreign('incenfor')->references('id')->on('gicenfor');
            $table->bigInteger('ingruinv')->unsigned();
            $table->foreign('ingruinv')->references('id')->on('gigruinv');

            $table->bigInteger('inrolsen')->unsigned();
            $table->foreign('inrolsen')->references('id')->on('girolinv');

            $table->string('intipdoc');
            $table->string('innumdoc');
            $table->string('infecexp');
            $table->string('inmunexp');
            $table->string('infecnac');
            $table->string('inprofes');
            $table->string('incorper');
            $table->string('incorsen');
            $table->string('innumcel');
            $table->string('intelfij');
            $table->string('innumeip');
            $table->string('inantsen');
            $table->string('ingrafor');
            $table->string('intitulo');
            $table->string('inporded');
            $table->string('inarecon');
            $table->string('inniving');
            $table->string('inprofor');

            $table->bigInteger('intipvin')->unsigned();
            $table->foreign('intipvin')->references('id')->on('givininv');

            $table->bigInteger('incarinv')->unsigned();
            $table->foreign('incarinv')->references('id')->on('gicarinv');

            $table->bigInteger('innumgra')->unsigned();
            $table->foreign('innumgra')->references('id')->on('gigrados');

            $table->double('inasimen');
            $table->string('innumcon');
            $table->string('inestcon');
            $table->bigInteger('inlininv')->unsigned();
            $table->foreign('inlininv')->references('id')->on('gilininv');
            $table->bigInteger('insemill')->unsigned();
            $table->foreign('insemill')->references('id')->on('gisemill');
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
        Schema::dropIfExists('giinvest');
    }
}
