<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('idHorario');
            $table->String('descripcion');
            $table->time('horaInicioHorario');
            $table->time('horaFinHorario');
            $table->integer('idSucursal')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('schedules', function(Blueprint $table){
            $table->foreign('idSucursal')->references('idSucursal')->on('branches')->onDelete('cascade');           
         });

        Schema::table('schedules', function ($table) {
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
        Schema::drop('schedules');
    }
}
