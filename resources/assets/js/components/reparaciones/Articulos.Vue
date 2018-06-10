<template>
    <div class="box box-primary contenedor">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-cubes"></i> Argregar articulos</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>Seleccione un articulo:</label>
                <select class="form-control" v-model="selected">
                    <option value="null">Seleccione..</option>
                    <option v-for="articulo in articulos" :value="articulo.id">{{ articulo.nombre }}</option>
                </select>
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
                <div class="form-group col-md-12">
                    <label for="">Enviar a la lista</label>
                    <input type="button"
                           value="Agregar"
                           class="btn btn-success btn-block"
                           @click="store()"
                           :disabled="isDisabled()">
                </div>
            
        </div>
    </div>
</template>

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
                    toastr.success(response.data.message)
                    /*emite un evento al componente tabla para que agregue un articulo*/
                    EventBus.$emit('addDetalle', response.data.data);
                    this.resetInputs();
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
            
            selected(id) {
                var self = this.articulos.find( articulo => articulo.id === id);
                self === undefined ? this.articulo = { marca : {}} : this.articulo = self;

            }
        }

    }
</script>