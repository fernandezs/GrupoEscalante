<template>
    <div class="box box-primary contenedor">
    <div class="box-header">
        <h3 class="box-title">
           <i class="fa fa-user"></i> {{ cliente.nombre }}
        </h3>
    </div>
    <div class="box-body">
        <input type="hidden" name="cliente_id" :value="cliente.id">
        <!-- Cliente Id Field -->
        <i class="fa fa-users"></i> <label>Cliente N°:</label>
        {{ cliente.num_cliente }}<br>
        <i class="fa fa-id-badge"></i> <label>Tipo de cliente:</label>
        {{ cliente.tipo}}<br>
        <i class="fa fa-phone"></i> <label>Telefono:</label>
        {{ cliente.telefono }}<br>
        <i class="fa fa-map-marker"></i> <label>Direccion:</label>
        {{ cliente.direccion }}<br> 
        <div class="form-group">
            <i class="fa fa-file"></i> <label>Breve descripcion:</label>
            <textarea class="form-control" name="detalle" id="detalle" :value="detalle">
           	</textarea>
        </div>
    </div>
</div>
</template>

<script>
    export default {
    	props : ['_cliente', 'detalle'],
        data() {
            return {
                cliente : null
            }
        },
        created() {
            this.cliente = this._cliente;
        },
        mounted() {
            
        }
    }
</script>