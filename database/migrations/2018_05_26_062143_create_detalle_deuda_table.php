<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleDeudaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_deuda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deuda_id')->unsigned();
            $table->integer('articulo_id')->unsigned();
            $table->decimal('precio_costo');
            $table->decimal('precio_venta');
            $table->integer('cantidad');
            $table->integer('descuento');
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
        Schema::dropIfExists('detalle_deuda');
    }
}
