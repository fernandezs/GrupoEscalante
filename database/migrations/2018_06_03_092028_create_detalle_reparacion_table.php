<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleReparacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reparacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('articulo_id')->unsigned();
            $table->integer('reparacion_id')->unsigned();
            $table->enum('origen', ['INTERNO', 'EXTERNO'])->default('INTERNO');
            $table->decimal('precio_unitario');
            $table->integer('cantidad');
            $table->decimal('subtotal');
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
        Schema::dropIfExists('detalle_reparacion');
    }
}
