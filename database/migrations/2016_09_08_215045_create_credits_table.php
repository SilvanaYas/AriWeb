<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('idCredito');
            $table->integer('montoMinimo');
            $table->integer('montoMaximo');
            $table->integer('plazoMinimo');
            $table->integer('plazoMaximo');
            $table->float('tasaInteres');
            $table->integer('idEmpresa')->length(10)->unsigned();
            $table->integer('idCategoria')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('credits', function(Blueprint $table){
            $table->foreign('idCategoria')->references('idCategoria')->on('categories')->onDelete('cascade');           
         });

        Schema::table('credits', function(Blueprint $table){
            $table->foreign('idEmpresa')->references('idEmpresa')->on('companies')->onDelete('cascade');           
         });

        Schema::table('credits', function ($table) {
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
        Schema::drop('credits');
    }
}
