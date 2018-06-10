<template>
    <div class="box box-primary contenedor">
        <div class="box-header">
            <h3 class="box-title">
                <i class="fa fa-linode"></i> {{ maquina.nombre }}
            </h3>
        </div>
        <div class="box-body">
            <!-- Cliente Id Field -->
            <i class="fa fa-barcode"></i> <label>Codigo N°:</label>
            {{ maquina.cod_articulo }}<br>
            <i class="fa fa-bars"></i> <label>Marca:</label>
            {{ maquina.marca.nombre}}<br>
            <i class="fa fa-microchip"></i> <label>Nro de cabezal:</label>
            {{ maquina.nro_cabezal }}<br>
            <div class="form-group">
                <i class="fa fa-file-text-o"></i> <label>Descripcion:</label>
                <textarea :value="maquina.descripcion" class="form-control"></textarea>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['maquina'],

        mounted() {
        }
    }
</script>