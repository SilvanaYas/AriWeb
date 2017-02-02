<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->increments('idPresentacion');
            $table->string('nombrePresentacion');
            $table->string('fabricante')->default("No Registrado");
            $table->string('observacion')->default("No Registrado");
            $table->integer('unidadesPresentacion');
            $table->float('precioTope')->default(0.00);
            $table->float('precioPresentacion');
            $table->float('precioUnidad')->default(0.00);
            $table->integer('idProducto')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('presentations', function(Blueprint $table){
            $table->foreign('idProducto')->references('idProducto')->on('products')->onDelete('cascade');           
         });

         Schema::table('presentations', function ($table) {
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
        Schema::drop('presentations');
    }
}
