<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoReparacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_reparacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reparacion_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('empleado_id')->unsigned();
            $table->date('fecha');
            $table->string('detalle');
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
        Schema::dropIfExists('estado_reparacion');
    }
}
