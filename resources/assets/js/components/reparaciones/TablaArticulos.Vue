<template>
    <table class="table table-hover table-striped" id="articulos_deudores">
        <thead>
            <tr>
                <th>Codigo art</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Origen</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(detalle, index) in detalles">
                <td width="10px">{{detalle.articulo.cod_articulo}}</td>
                <td>{{detalle.articulo.nombre}}</td>
                <td>{{detalle.articulo.marca.nombre}}</td>
                <td>${{detalle.precio_unitario}}</td>
                <td>{{detalle.origen}}</td>
                <td>{{detalle.cantidad}}</td>
                <td>${{detalle.subtotal}}</td>
                <td width="10px">
                    <a><span class="fa fa-trash" @click="borrar(detalle.id, index)"></span></a>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props : ['listadetalles'],
        data() {
            return {
                detalles : []
            }
        },
        created() {
            this.detalles = this.listadetalles;
            console.log(this.listadetalles);
            EventBus.$on('addDetalle', function(detalle) {
                console.log(detalle);
                this.detalles.push(detalle);
            }.bind(this));
        },
        methods : {
            borrar(id, index) {
                this.detalles.splice(index,1);
                EventBus.$emit('delete', id);
            }
        }
    }
</script>