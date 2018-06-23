<template>
    <div>
        <label for="add">Agregar un repuesto:</label>  <button type="button" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
        <div class="modal fade" role="dialog" id="myModal" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="box-header with-border">
                            <h4 class="box-title"><i class="fa fa-cubes"></i> Argregar articulos</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Seleccione un articulo:</label>
                                    <v-select v-model="selected"  :options="lista" placeholder="Seleccione un articulo..."></v-select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Valor de venta:</label>
                                    <input type="text" disabled="true" v-model="articulo.precio_venta" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Marca:</label>
                                    <input type="text" disabled="true" v-model="articulo.marca.nombre" class="form-control" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Cantidad:</label>
                                    <div class="input-group">
                                        <input type="number" v-model.number="cantidad" class="form-control">
                                        <span class="input-group-btn">
                            <button class="btn btn-default" @click="cantidad+=1" type="button" >+</button>
                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Origen:</label>
                                    <select class="form-control" v-model="origen">
                                        <option value='null'>Seleccione..</option>
                                        <option >INTERNO</option>
                                        <option >EXTERNO</option>
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                               type="button"
                               value="Agregar"
                               class="btn btn-success"
                               @click="store()"
                               :disabled="isDisabled()"> Agregar articulo
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"  id="closeModal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>

<script>

    export default {
        props : ['listaarticulos', 'reparacion_id'],
        data() {
            return {
                selected  : null,
                cantidad  : 1,
                origen    : null,
                articulo  : { marca: {} },
                articulos : [],

            }
        },
        computed : {
          lista() {
              return  this.articulos.map(function (key) {
                  return { label : key.nombre, value : key.id }
              });
          }
        },
        methods : {
            resetInputs() {
                this.selected = null;
                this.cantidad = 1;
                this.articulo = { marca : {}};
                this.origen   = null;
            },
            isDisabled() {
                return this.origen == null || this.articulo.nombre == null;
            },
            getSubtotal(imp, cant) {
                return parseFloat(imp * cant).toFixed(2);
            },
            store () {
                var url = '/detalleReparacion';
                axios.post(url, {
                    reparacion_id   : this.reparacion_id,
                    articulo_id     : this.articulo.id,
                    origen          : this.origen,
                    precio_unitario : this.articulo.precio_venta,
                    cantidad        : this.cantidad,
                    subtotal        : this.getSubtotal(this.articulo.precio_venta,
                                                    this.cantidad)
                }).then(response => {
                    /*emite un evento al componente tabla para que agregue un articulo*/
                    EventBus.$emit('addDetalle', response.data.data);
                    this.resetInputs();
                    $('#closeModal').click();
                    toastr.success(response.data.message)
                  });
            },
            delete(id) {
                var url = '/detalleReparacion/' + id;
                axios.delete(url).then(response => { 
                    this.resetInputs();
                    toastr.warning(response.data.message);});
            }
        },
        created () {
            this.articulos = this.listaarticulos;
            EventBus.$on('delete', function(id) {
                this.delete(id);
            }.bind(this));
        },
        watch : {
            
            selected(key) {
                if(key != null) {
                    this.articulo = this.articulos.find( articulo => articulo.id === key.value);
                }
                else {
                    this.articulo = { marca : {}}
                }
                
            }
        }

    }
</script>