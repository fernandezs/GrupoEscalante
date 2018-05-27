<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_cliente')->unique();
            $table->string('nombre');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->enum('doc_tipo', [ 'DNI',
                                     'CUIT',
                                     'CEDULA'])->default('DNI');
            $table->string('doc_numero')->nullable();
            $table->enum('tipo', ['Consumidor Final',
                                   'Empleado',
                                   'Monotributista',
                                   'Responsable Inscripto',
                                   'Revendedor',
                                   'Comerciante',
                                   'Gremio'])->default('Consumidor Final');
            $table->string('direccion')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
