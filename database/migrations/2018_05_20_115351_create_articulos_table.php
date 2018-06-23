<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cod_articulo')->unique();
            $table->string('modelo')->nullable();
            $table->integer('categoria_id')->unsigned();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->integer('marca_id')->unsigned();
            $table->decimal('precio_costo', 8,2);
            $table->decimal('precio_venta', 8,2);
            $table->integer('cantidad');
            $table->integer('cantidad_minima');
            $table->string('foto')->nullable();
            $table->integer('nro_cabezal')->nullable();
            $table->enum('estado', ['DISPONIBLE', 'NO DISPONIBLE'])->default('DISPONIBLE');
            $table->timestamps();
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
        Schema::dropIfExists('articulos');
    }
}
