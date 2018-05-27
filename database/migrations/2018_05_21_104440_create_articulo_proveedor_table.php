<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_proveedor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('articulo_id')->unsigned();
            $table->integer('proveedor_id')->unsigned();

            $table->foreign('articulo_id')->references('id')
                                        ->on('articulos')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
            $table->foreign('proveedor_id')->references('id')
                                        ->on('proveedores')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_proveedor');
    }
}
