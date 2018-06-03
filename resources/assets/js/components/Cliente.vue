<template>
    <div class="box box-primary contenedor">
    <div class="box-header">
        <h3 class="box-title">
           <i class="fa fa-user"></i> {{ cliente.nombre }}
        </h3>
    </div>
    <div class="box-body">
        <!-- Cliente Id Field -->
        <i class="fa fa-users"></i> <label>Cliente N°:</label>
        {{ cliente.num_cliente }}<br>
        <i class="fa fa-address-card"></i> <label>Tipo de cliente:</label>
        {{ cliente.tipo}}<br>
        <i class="fa fa-phone"></i> <label>Telefono:</label>
        {{ cliente.telefono }}<br>
        <i class="fa fa-truck"></i> <label>Direccion:</label>
        {{ cliente.direccion }}<br> 
        <div class="form-group">
            <i class="fa fa-file"></i> <label>Breve descripcion:</label>
            <textarea rows="3" class="form-control" name="descripcion" id="descripcion" :value="descripcion">
           	</textarea>
        </div>
    </div>
</div>
</template>

<script>
    export default {
    	props : ['cliente', 'descripcion'],
        data() {
            return {
                msj : 'Hola soy el msj y ahora cambie',
            }
        },
        mounted() {
            
        }
    }
</script>