<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nit');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correoelectronico')->nullable();
            $table->boolean('estado')->default(1); 
            $table->bigInteger('idciudad')->unsigned();
            $table->foreign('idciudad')->references('idciudad')->on('cities'); 
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
