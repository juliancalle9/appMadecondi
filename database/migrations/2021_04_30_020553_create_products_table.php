<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
              $table->boolean('estado')->default(1); 
                $table->bigInteger('idlote')->unsigned();
                $table->foreign('idlote')->references('idlote')->on('lots');   $table->bigIncrements('idproducto');
                $table->string('nombre');
                $table->double('preciounitario');
               
                $table->bigInteger('idcategoria')->unsigned();
                $table->foreign('idcategoria')->references('idcategoria')->on('categories');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
