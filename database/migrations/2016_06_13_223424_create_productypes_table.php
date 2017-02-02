<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productypes', function (Blueprint $table) {
            $table->increments('idTipoProducto');
            $table->string('nombreTipoProducto');
            $table->integer('idGrupo')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('productypes', function(Blueprint $table){
            $table->foreign('idGrupo')->references('idGrupo')->on('groups')->onDelete('cascade');           
         });

        Schema::table('productypes', function ($table) {
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
        Schema::drop('productypes');
    }
}
