<template>
    <div class="box box-primary contenedor">
        <div class="box-header">
            <h3 class="box-title">
                <i class="fa fa-bug"></i> {{ maquina.nombre }}
            </h3>
        </div>
        <div class="box-body">
            <!-- Cliente Id Field -->
            <i class="fa fa-users"></i> <label>Codigo N°:</label>
            {{ maquina.cod_articulo }}<br>
            <i class="fa fa-address-card"></i> <label>Marca:</label>
            {{ maquina.marca.nombre}}<br>
            <i class="fa fa-phone"></i> <label>Nro de cabezal:</label>
            {{ maquina.nro_cabezal }}<br>
            <i class="fa fa-truck"></i> <label>Categoria:</label>
            iria la categoria<br>
            <div class="form-group">
                <i class="fa fa-file"></i> <label>Accesorios:</label>

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