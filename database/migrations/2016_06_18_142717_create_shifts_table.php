<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->increments('idTurno');
            $table->timestamp('fechaInicio'); 
            $table->timestamp('fechaFin'); 
            $table->time('horaInicio'); 
            $table->time('horaFin');  
            $table->boolean('activo')->default(0); 
            $table->integer('idSucursal')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('shifts', function(Blueprint $table){
            $table->foreign('idSucursal')->references('idSucursal')->on('branches')->onDelete('cascade');           
         });

        Schema::table('shifts', function ($table) {
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
        Schema::drop('shifts');
    }
}
