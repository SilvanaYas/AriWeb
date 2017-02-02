<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('idSucursal');
            $table->string('nombreSucursal');
            $table->string('direccion');
            $table->double('latitud',15,8)->nullable();
            $table->double('longitud',15,8)->nullable();
            $table->string('telefono');
            $table->boolean('activo')->default(0);
            $table->string('propietario');
            $table->string('email');
            $table->integer('idLocalizacion')->length(10)->unsigned();
            $table->integer('idEmpresa')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('branches', function(Blueprint $table){
            $table->foreign('idLocalizacion')->references('idLocalizacion')->on('locations')->onDelete('cascade');        
        });

         Schema::table('branches', function(Blueprint $table){
            $table->foreign('idEmpresa')->references('idEmpresa')->on('companies')->onDelete('cascade');        
        });

         Schema::table('branches', function ($table) {
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
        Schema::drop('branches');
    }
}
