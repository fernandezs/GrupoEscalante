<template>
    <div class="box box-primary contenedor">
        <div class="box-header">
            <h3 class="box-title">
                <i class="fa fa-sitemap"></i> Asignar un estado
            </h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>Estado:</label>
                <select name="estado_id" id="estado_id" class="form-control" v-model="estado">
                    <option value="null">Seleccione un estado...</option>
                    <option v-for="estado in estados" :value="estado.id">
                        {{ estado.estado}}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label>Empleado:</label>
                <v-select v-model="empleado"  :options="lista" placeholder="Seleccione un empleado..."></v-select>
            </div>
            <div class="form-group">
                <label>Detalle:</label>
                <textarea name="detalle" id="detalle" cols="3" rows="6" v-model="detalle" class="form-control"></textarea>
                
            </div>
            <div class="form-group">
                <button type="button" class="btn" @click="resetInputs()" v-show="isEditing">Cancelar</button>
                <button type="button" class="btn btn-info" :disabled="isDisabled" @click="store()" v-if="!isEditing">Agregar estado</button>
                <button type="button" class="btn btn-info" :disabled="isDisabled" @click="update()" v-if="isEditing">Guardar estado</button>
            </div>
        </div>
    </div>
</template>

<script>
    
    export default {
        props : ['reparacion_id', 'listaestados', 'listaempleados'],
        data() {
          return {
              estados : [],
              empleados : [],
              estado : null,
              empleado : null,
              detalle: null,
              isEditing : false,
              estado_id : null
          }
        },
        created() {
            this.estados   = this.listaestados
            this.empleados = this.listaempleados
            EventBus.$on('showEstado', function (estado) {
                this.show(estado)
            }.bind(this));
            EventBus.$on('edit', function(estado) {
                this.edit(estado);
            }.bind(this));
        },
        computed : {
            isDisabled() {
                return this.estado == null || this.empleado == null;
            },
            lista() {
                return  this.empleados.map(function (key) {
                    return { label : key.nombre, value : key.id }
                });
            }
        },

        methods : {
            store() {
                axios.post('/estadoReparacion', {
                    reparacion_id : this.reparacion_id,
                    estado_id : this.estado,
                    empleado_id : this.empleado.value,
                    detalle : this.detalle
                }).then(response => {
                    toastr.success(response.data.message)
                    this.resetInputs()
                    /*Emite el evento agregaEstado y es escuchado en el componente EstadoReparacionTabla*/
                    EventBus.$emit('agregaEstado', response.data.data);
                }).catch(error => {
                    console.log(error.message)
                });
            },
            show(estado) {

            },
            edit(estado) {
                this.resetInputs();
                this.isEditing = true;
                this.estado = estado.estado_id;
                this.empleado = this.lista.findIndex(i => i.id === estado.empleado_id);;
                this.detalle = estado.detalle;
                this.estado_id = estado.id;
            },
            update() {
                axios.put('/estadoReparacion/' + this.estado_id, {
                    estado_id : this.estado,
                    empleado_id : this.empleado,
                    detalle : this.detalle
                }).then(response => {
                    toastr.success(response.data.message)
                    this.resetInputs()
                    /*Emite el evento editEstado y es escuchado en el componente EstadoReparacionTabla*/
                    EventBus.$emit('editEstado', response.data.data);
                }).catch(error => {
                    console.log(error.message)
                });

            },
            resetInputs()
            {
                this.estado = null;
                this.empleado = null;
                this.detalle = null;
                this.isEditing = false;
                this.estado_id = null;
            }

        },

        mounted() {
        }
    }
</script>