<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->string('nombreUsuario');
            $table->string('apellidoUsuario');
            $table->string('telefonoUsuario');
            $table->string('confirm_token',100)->nullable();
            $table->string('email')->unique();
            $table->boolean('activo')->default(0);
            $table->string('password', 60);  
            $table->integer('idRol')->length(10)->unsigned();
            $table->integer('idEmpresa')->length(10)->unsigned()->nullable();
            $table->integer('idSucursal')->length(10)->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::table('users', function(Blueprint $table){
            $table->foreign('idRol')->references('idRol')->on('rols')->onDelete('cascade');           
         });

        Schema::table('users', function(Blueprint $table){
            $table->foreign('idEmpresa')->references('idEmpresa')->on('companies')->onDelete('cascade');           
         });

        Schema::table('users', function(Blueprint $table){
            $table->foreign('idSucursal')->references('idSucursal')->on('branches')->onDelete('cascade');           
         });

        Schema::table('users', function ($table) {
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
        Schema::drop('users');
    }
}
