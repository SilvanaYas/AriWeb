<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('idEmpresa');
            $table->string('nombreEmpresa');         
            $table->string('logo')->default('default.png');
            $table->boolean('activo')->default(0);          
            $table->integer('idGrupo')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('companies', function(Blueprint $table){
            $table->foreign('idGrupo')->references('idGrupo')->on('groups')->onDelete('cascade');           
         });

        Schema::table('companies', function ($table) {
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
        Schema::drop('companies');
    }
}
