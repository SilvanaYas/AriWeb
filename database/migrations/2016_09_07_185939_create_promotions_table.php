<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('idPromocion');
            $table->string('nombrePromocion');
            $table->string('descripcion');
            $table->timestamp('fechaInicioPromo'); 
            $table->timestamp('fechaFinPromo'); 
            $table->boolean('activo')->default(0);
            $table->integer('idPresentacion')->length(10)->unsigned();
            $table->timestamps();

        });

        Schema::table('promotions', function(Blueprint $table){
            $table->foreign('idPresentacion')->references('idPresentacion')->on('presentations')->onDelete('cascade');           
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('promotions');
    }
}
