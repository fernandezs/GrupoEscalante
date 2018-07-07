<template>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">
                <i class="fa fa-sitemap"></i> Estados de la reparacion
            </h3>
        </div>

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
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
                        <td>{{ estado.empleado == null ? 'SISTEMA' : estado.empleado.nombre  }}</td>
                        <td>{{ estado.estado.estado }}</td>
                        <td>{{ estado.fecha | fecha-local}}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" title="Editar estado" @click="editarEstado(estado)"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
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
            }.bind(this));
            /*Escucha el evento editEstado en el componente ReparacionEstado.Vue*/
            EventBus.$on('editEstado', function(estado) {
                this.actualizarEstadoEnTabla(estado);
            }.bind(this));
        },
        methods : {
            addEstado(estado) {
                this.estados.push(estado)
            },
            editarEstado(estado) {
                EventBus.$emit('edit', estado);
            },
            /*Cuando se actualiza un estado, se actualiza la tabla*/
            actualizarEstadoEnTabla(estado) {
                var index = this.estados.findIndex(i => i.id === estado.id);
                this.estados.splice(index,1,estado);
            }
        },
        mounted() {
        }
    }
</script>