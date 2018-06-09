<template>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">
                <i class="fa fa-sitemap"></i> Estados de la reparacion
            </h3>
        </div>

        <div class="box-body">
            <table class="table table-responsive table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Empleado</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th ><b class="text-center">Acciones</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="estado in estados">
                        <td>{{ estado.user.username }}</td>
                        <td>{{ estado.empleado.nombre }}</td>
                        <td>{{ estado.estado.estado }}</td>
                        <td>{{ estado.fecha | fecha-local}}</td>
                        <td>
                            <a href="#" class="btn btn-default btn-sm" title="Ver estado" @click="showEstado(estado)"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-sm" title="Editar estado"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" title="Eliminar estado"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['reparacion_id','listaestados'],
        data() {
            return {
                estados : []
            }
        },
        created() {
            this.estados = this.listaestados
            /*Escucha el evento agregaEstado en el componente ReparacionEstado.Vue*/
            EventBus.$on('agregaEstado', function(estado){
                this.addEstado(estado)
            }.bind(this))
        },
        methods : {
            addEstado(estado) {
                this.estados.push(estado)
            },
            showEstado(estado) {
                EventBus.$emit('showEstado', estado)
            }
        },
        mounted() {
        }
    }
</script>