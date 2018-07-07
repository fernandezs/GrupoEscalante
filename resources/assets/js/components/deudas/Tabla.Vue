<template>
    <table class="table table-hover table-striped" id="articulos_deudores">
        <thead>
            <tr>
                <th>Codigo art</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Precio costo</th>
                <th>Precio venta</th>
                <th>Descuento</th>
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
                <td>${{detalle.articulo.precio_costo}}</td>
                <td>${{detalle.articulo.precio_venta}}</td>
                <td>{{detalle.descuento}}%</td>
                <td>{{detalle.cantidad}}</td>
                <td>${{detalle.subtotal}}</td>
                <td width="10px" v-if="inpago">
                    <a><span class="fa fa-trash" @click="borrar(detalle.id, index)"></span></a>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props : ['listadetalles','estado'],
        data() {
            return {
                detalles : []
            }
        },
        created() {
            this.detalles = this.listadetalles;
            EventBus.$on('addDetalle', function(detalle) {
                this.detalles.push(detalle);
                EventBus.$emit('actualizarImportes', (this.subtotal()));
            }.bind(this));
            EventBus.$on('quitarDeLaLista', function(index) {
                this.detalles.splice(index,1);
                EventBus.$emit('actualizarImportes', (this.subtotal()));
            }.bind(this));
        },
        computed: {
            inpago() {
                return this.estado == 'INPAGO'
            }
        },
        methods : {
            borrar(id, index) {
                /*Emite evento delete al archivo Articulos.Vue*/
                EventBus.$emit('delete', [id,index]);
            },
            subtotal() {
                return this.detalles.reduce(function(total, detalle) {
                    return total + parseFloat(detalle.subtotal);
                }, 0);
            }
        }
    }
</script>

