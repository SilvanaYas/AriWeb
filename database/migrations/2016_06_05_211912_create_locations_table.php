<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('idLocalizacion');
            $table->integer('idProvincia')->length(10)->unsigned();
            $table->integer('idCanton')->length(10)->unsigned();
            $table->integer('idParroquia')->length(10)->unsigned();
            $table->timestamps();
        });

         Schema::table('locations', function(Blueprint $table){
            $table->foreign('idProvincia')->references('idProvincia')->on('provinces')->onDelete('cascade');           
         });

          Schema::table('locations', function(Blueprint $table){
            $table->foreign('idCanton')->references('idCanton')->on('cantons')->onDelete('cascade');           
         });

           Schema::table('locations', function(Blueprint $table){
            $table->foreign('idParroquia')->references('idParroquia')->on('parishes')->onDelete('cascade');           
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('locations');
    }
}
