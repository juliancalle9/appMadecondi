<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesDetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idVenta')->unsigned();
            $table->bigInteger('idproducto')->unsigned();
            $table->Integer('cantidad');
            $table->double('valorTotal');
            $table->foreign('idVenta')->references('idVenta')->on('sales'); 
            $table->foreign('idproducto')->references('idproducto')->on('products');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesDetail');
    }
}
