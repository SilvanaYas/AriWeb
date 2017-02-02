<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('idProducto');
            $table->string('nombreProducto');
            $table->string('similarProducto')->default("No Registrado");
            $table->integer('idTipoProducto')->length(10)->unsigned();
            $table->integer('idEmpresa')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('products', function(Blueprint $table){
            $table->foreign('idTipoProducto')->references('idTipoProducto')->on('productypes')->onDelete('cascade');           
         });

        Schema::table('products', function(Blueprint $table){
            $table->foreign('idEmpresa')->references('idEmpresa')->on('companies')->onDelete('cascade');           
         });

        Schema::table('products', function ($table) {
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
        Schema::drop('products');
    }
}
