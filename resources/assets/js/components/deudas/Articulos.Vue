<template>
    <div class="box box-primary contenedor">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-cubes"></i> Argregar articulos</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>Seleccione un articulo:</label>
                <v-select v-model="selected" :disabled="pagado" :options="lista" placeholder="Seleccione un articulo..."></v-select>
            </div>
            <div class="form-group col-md-4">
                <label for="">Stock:</label>
                <input type="text" disabled="true" v-model="articulo.cantidad" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="">Valor de venta:</label>
                <input type="text" v-model="articulo.precio_venta" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="">Marca:</label>
                <input type="text" disabled="true" v-model="articulo.marca.nombre" class="form-control" >
            </div>
            <div :disabled="true">
                <div class="form-group col-md-4">
                    <label for="">Descuento:</label>
                    <div class="input-group">
                        <input type="number" v-model.number="descuento" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" @click="descuento+=5" type="button">%</button>
                        </span>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Cantidad:</label>
                    <div class="input-group">
                        <input type="number" v-model.number="cantidad" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" @click="cantidad+=1" type="button" >+</button>
                        </span>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Enviar a la lista</label>
                    <input type="button"
                           value="Agregar"
                           class="btn btn-success btn-block"
                           @click="store()"
                           :disabled="!articulo.cantidad">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueSweetalert2 from 'vue-sweetalert2';
    Vue.use(VueSweetalert2);
    export default {
        props : ['listaarticulos', 'deuda_id', 'estado'],
        data() {
            return {
                selected  : null,
                cantidad  : 1,
                descuento : 0,
                articulo  : { marca: {} },
                articulos : [],

            }
        },
        computed : {
            lista() {
                //necesario para el plugin vselect2
                return  this.articulos.map(function (key) {
                    return { label : key.nombre, value : key.id }
                });
            },
            pagado() {
                return this.estado == 'PAGADO';
            }
        },
        methods : {
            /*cuando se agrega un articulo se descuenta el stock del mismo*/
            updateKeys() {
                var index = this.articulos.findIndex(i => i.id === this.selected);
                this.articulo.cantidad = this.articulo.cantidad - this.cantidad;
                this.articulos.splice(index,1,this.articulo);
            },
            /*cuando se elimina un articulo se normaliza su stock*/
            updateKeysOnDelete(articulo) {
                var index = this.articulos.findIndex(i => i.id === articulo.id);
                this.articulos.splice(index,1,articulo);
            },
            resetInputs() {
                this.selected = null;
                this.cantidad = 1;
                this.descuento = 0;
                this.articulo = { marca : {}};
            },
            getSubtotal(imp, cant, desc) {
                var imp_desc = (desc*0.01) * imp;
                return parseFloat((imp - imp_desc) * cant ).toFixed(2);
            },
            store () {
                var url = '/api/detalle_deudas';
                axios.post(url, {
                    deuda_id     : this.deuda_id,
                    articulo_id  : this.articulo.id,
                    precio_costo : this.articulo.precio_costo,
                    precio_venta : this.articulo.precio_venta,
                    cantidad     : this.cantidad,
                    descuento    : this.descuento,
                    subtotal     : this.getSubtotal(this.articulo.precio_venta,
                                                    this.cantidad,
                                                    this.descuento)
                }).then(response => { 
                    toastr.success(response.data.message)
                    /*emite un evento al componente tabla para que agregue un articulo*/
                    EventBus.$emit('addDetalle', response.data.data)
                    this.updateKeys();
                    this.resetInputs();
                  });
            },
            delete(id, index) {
                this.$swal( {
                    title : 'Estas seguro?',
                    text  : 'Esta accion no se puede deshacer',
                    type  : 'warning',
                    showCancelButton : true,
                    confirmButtonText : 'Si, borralo!'
                }).then((result) => {
                    if(result.value) {
                        var url = '/api/detalle_deudas/' + id;
                        axios.delete(url).then(response => { 
                        /*response devuelve el articulo con el stock actualizado*/
                        this.updateKeysOnDelete(response.data.data)});
                        EventBus.$emit('quitarDeLaLista', index);
                        this.resetInputs();
                        this.$swal(
                            'Borrado',
                            'Articulo borrado de la lista',
                            'success')
                    }
                })

                
            }
        },
        created () {
            this.articulos = this.listaarticulos;
            EventBus.$on('delete', function(id, index) {
                this.delete(id, index);
            }.bind(this));
        },
        watch : {
            cantidad() {
                if(this.cantidad > this.articulo.cantidad){
                    if(this.articulo.cantidad != 0){
                        this.cantidad = this.articulo.cantidad;
                        toastr.info('El valor ingresa supera la cantidad en Stock')
                    }
                }
                if(this.cantidad <= 0) {
                    this.cantidad = 1;
                    toastr.info('La cantidad debe ser superior a 1')
                }
                
            },
            descuento() {
                if(this.descuento >= 100) {
                    this.descuento = 100;
                    toastr.info('El valor descuento no puede superar el precio del producto!')
                }
                if(this.descuento < 0) {
                    this.descuento = 0;
                    toastr.info('El descuento no puede ser inferior a 0')
                }
            },
            selected(key) {
                if(key != null) {
                    this.articulo = this.articulos.find( articulo => articulo.id === key.value);
                    if(this.articulo.cantidad < this.cantidad && this.articulo.cantidad != 0) {
                        this.cantidad = this.articulo.cantidad;
                    }
                }
                else {
                    this.articulo = { marca: {}}
                }
            }
        }

    }
</script>