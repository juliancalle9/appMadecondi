<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('purchasesdetails', function (Blueprint $table) {
            $table->bigIncrements('iddetallecompra');
            $table->bigInteger('idcompra')->unsigned();
            $table->foreign('idcompra')->references('idcompra')->on('purchases'); 
            $table->bigInteger('idproducto')->unsigned();
            $table->foreign('idproducto')->references('idproducto')->on('products'); 
            $table->Integer('cantidad');
            $table->double('precioFinal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasesdetails');
    }
}
