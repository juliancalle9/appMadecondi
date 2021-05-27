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
                $table->string('nombre');
<<<<<<< HEAD
                $table->Integer('cantidad');
=======
                $table->string('cantidad');
>>>>>>> d8772141c432363fd5107c54e3ba3f87f3d5dc74
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
