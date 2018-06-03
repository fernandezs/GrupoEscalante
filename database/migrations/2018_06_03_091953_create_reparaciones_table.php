<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cod_factura');
            $table->integer('articulo_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->decimal('costo_reparacion')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('estado')->nullable();
            $table->enum('tipo_garantia',['GRUPO ESCALANTE', 'FABRICANTE'])->default('GRUPO ESCALANTE');
            $table->date('fecha_egreso')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('dias_garantia')->nullable();
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
        Schema::dropIfExists('reparaciones');
    }
}
