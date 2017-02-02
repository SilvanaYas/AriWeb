<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_branches', function (Blueprint $table) {
            $table->increments('idStockSucursal');
            $table->integer('idProducto')->length(10)->unsigned();
            $table->integer('idSucursal')->length(10)->unsigned();
            $table->timestamps();
        });

        Schema::table('stock_branches', function(Blueprint $table){
            $table->foreign('idProducto')->references('idProducto')->on('products')->onDelete('cascade');        
        });

        Schema::table('stock_branches', function(Blueprint $table){
            $table->foreign('idSucursal')->references('idSucursal')->on('branches')->onDelete('cascade');        
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stock_branches');
    }
}
