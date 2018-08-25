<template>
    <div>
        <div class="col-md-4 foto" id="foto">
            <!-- Foto Field -->
            <div class="form-group">
                <label name="foto">Foto:</label>
                <input id="files" name="foto" type="file">
            </div>
        </div>
        <div class="col-md-8">
            <!-- Nombre Field -->
        <div class="form-group col-sm-6">
            <label name="nombre">Nombre:</label>
            <input type="text" v-model="nombre" class="form-control" placeholder="Ingrese un nombre">
        </div>
    
        <!-- Cod Articulo Field -->
        <div class="form-group col-sm-3">
            <label for="cod_articulo">Código de Articulo</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-barcode"></i>
                </span>
                <input type="number" v-model="cod_articulo" class="form-control">   
            </div>
        </div>
    
        <div class="form-group col-sm-3">
            <label for="modelo">Modelo:</label>
            <input type="text" v-model="modelo" class="form-control">
        </div>
    
        <!-- Categoria Id Field -->
        <div class="form-group col-sm-6">
            <label for="categoria_id">Categoria:</label>
            <div class="input-group select2-bootstrap-prepend">
                <select name="categoria_id" id="categorias" v-model="categoria" placeholder="" class="form-control" style="width: 100%;">
                    <option :value="categoria.id" v-for="categoria in categorias">{{ categoria.nombre }}</option>
                </select>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default" @click="createCategoria()">
                        <span class="glyphicon glyphicon-plus"></span> Agregar
                    </button>
            </span>
            </div>
        </div>
    
    
        <!-- Marca Id Field -->
        <div class="form-group col-sm-6">
            <label for="marca_id">Marca:</label>
            <div class="input-group select2-bootstrap-prepend">
                <select name="marca_id" id="marcas" v-model="marca_id" placeholder="" class="form-control" style="width: 100%;">
                    <option :value="m.id" v-for="m in marcas">{{ m.nombre }}</option>
                </select>
                <span class="input-group-btn">
                        <button type="button" class="btn btn-default" @click="createMarca()">
                            <span class="glyphicon glyphicon-plus"></span> Agregar
                        </button>
            </span>
            </div>
        </div>
    
        <!-- Descripcion Field -->
        <div class="form-group col-sm-12 col-lg-12">
            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" v-model="descripcion" id="descripcion" rows="3" class="form-control">
    
            </textarea>
        </div>
    
        <!-- Precio Costo Field -->
        <div class="form-group col-sm-3">
            <label for="precio_costo">Precio Costo:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    usd <i class="fa fa-dollar"></i>
                </span>
                <input type="number" v-model="precio_costo" class="form-control" step="0.01" placeholder="dolares" @keyUp="setPrecioVenta()">
            </div>
    
        </div>
    
        <!-- Precio Venta Field -->
        <div class="form-group col-sm-3">
            <label for="precio_venta">Precio Venta:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                </span>
                <input type="number" class="form-control" step="0.01" placeholder="en pesos" v-model="precio_venta">
            </div>
        </div>
    
        <!-- Cantidad Field -->
        <div class="form-group col-sm-3">
            <label for="cantidad">Cantidad:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-th-large"></i>
                </span>
                <input type="cantidad" v-model="cantidad" class="form-control">
            </div>
        </div>
    
        <!-- Cantidad Minima Field -->
        <div class="form-group col-sm-3">
            <label for="cantidad_minima">Cantidad Minima:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-th-large"></i>
                </span>
                <input type="number" v-model="cantidad_minima" class="form-control">
            </div>
        </div>
    
        <div class="form-group col-sm-12">
            
            <label class="typo__label">Simple select / dropdown</label>
            <multiselect v-model="proveedores" :options="lista_proveedores" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="Pick some" label="name" track-by="name" :preselect-first="true">
                <template slot="tag" slot-scope="props"><span class="custom__tag"><span>{{ props.proveedores.nombre }}</span><span class="custom__remove" @click="props.remove(props.option)">❌</span></span></template>
            </multiselect>
            <pre class="language-json"><code>{{ proveedores  }}</code></pre>

        </div>

        
    
        <!-- Nro Cabezal Field -->
        <div class="form-group col-sm-6">
            <label for="nro_cabezal">Nro Cabezal:</label>
            <input type="number" class="form-control" v-model="nro_cabezal" placeholder="Agregue solo si corresponde">
        </div>
    
        <!-- Estado Field -->
        <div class="form-group col-sm-6">
            <label for="estado">Estado:</label>
            <select name="estado" id="estado" v-model="estado" class="form-control">
                <option :value="0">DISPONIBLE</option>
                <OPtion :value="1">NO DISPONIBLE</OPtion>
            </select>
        </div>
    
        <!-- Submit Field -->
        <div class="form-group col-sm-12 pull-right">
            <input type="submit" value="Guardar" class="btn btn-success">
            <input type="button" @click="regresar()" class="btn btn-default" value="Cancelar">
        </div>
        </div>


        <div class="modal fade" role="dialog" id="modalCategoria" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-edit"></i> Nueva categoría</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre') !!}
                        <input type="text" class="form-control" name="categoria" @keyUp.enter="storeCategoria()" v-model="modalC" id="modalC">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" @click="storeCategoria()">Guardar</button>
                <button class="btn" data-dismiss ="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="modalMarca" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-edit"></i> Nueva marca</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    <input type="text" @keyUp.enter="storeMarca()" name="marca" class="form-control" v-model="modalM" id="modalM">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="storeMarca()">Guardar</button>
                <button class="btn" data-dismiss ="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
        export default {
            components: {
                Multiselect
            },
            data() {
                return {
                    lista_proveedores : [],
                    categorias : [],
                    marcas : [],
                    proveedores : [],
                    categoria_id : null,
                    categoria : null,
                    marca : "1",
                    dolar : null,
                    marca_id : null,
                    modelo : null,
                    modalC : false,
                    modalM : null,
                    nombre : null,
                    foto : null,
                    estado : null,
                    cantidad : null,
                    cantidad_minima : null,
                    precio_costo : null,
                    precio_venta : null,
                    cod_articulo : null,
                    nro_cabezal : null,
                    descripcion : null,
                    value: [],
                    options: [
                        { name: 'Vue.js', language: 'JavaScript' },
                        { name: 'Adonis', language: 'JavaScript' },
                        { name: 'Rails', language: 'Ruby' },
                        { name: 'Sinatra', language: 'Ruby' },
                        { name: 'Laravel', language: 'PHP' },
                        { name: 'Phoenix', language: 'Elixir' }
                    ]

                }
            },
            methods : {
                read(notificacion) {
                    axios.patch('notificaciones.read' + notificacion.id).then(res => {
                        console.log(res.data);
                    })
                },
                //llama al modal para guardar una marca
            createMarca() {
                $("#modalMarca").modal('show');
                $("#modalM").focus();
            },
            //metodo para guardar una marca
            storeMarca() {
                if(this.modalM == null) {
                    alert('Completa este campo!')
                    $("#modalM").focus();
                }
                else {
                    axios.post('/api/marcas', { nombre : this.modalM }).then(response => {
                        $('#modalMarca').modal('hide');
                        this.modalM = null;
                        toastr.info(response.data.message);
                        this.marcas.push(response.data.data);
                        this.marca = response.data.data.id;
                    }).catch(error => {
                        $('#modalM').focus();
                        alert('La Marca "' + this.modalM + '" ya existe, ingrese otra!');
                    });
                }
            },

            setPrecioVenta() {
                this.precio_venta = this.dolar*this.precio_costo;
            },

            createCategoria() {
                $("#modalCategoria").modal('show');
                $("#modalC").focus();
            },
            //metodo para guardar una categoria
            storeCategoria() {
                if(this.modalC == null) {
                    $("modalC").focus();
                    alert('Completa este campo!')
                    
                }
                else {
                    axios.post('/api/categorias', { nombre : this.modalC }).then(response => {
                        //escondo el modal
                        $('#modalCategoria').modal('hide');
                        this.modalC = null;
                        //respuesta del servidor
                        toastr.info(response.data.message);
                        //se agrega una categoria a la lista de categorias
                        this.categorias.push(response.data.data);
                        //seteo una categoria
                        this.categoria = response.data.data.id;
                        this.categoriaModal = null;
                    }).catch(error => {
                        $('#modalC').focus();
                        alert('La Categoria "'+ this.modalC + '" ya existe, ingrese otra!');
                    });
                }
            },
            formated(val) {
                return parseFloat(val).toFixed(2);
            }
            },
            mounted() {
                console.log("se creó");
                axios.get('proveedores').then(res => {
                    this.lista_proveedores = res.data;
                    console.log(res.data);
                }).catch(err => {
                    console.log(err);
                });
                let self = this; // ámbito de vue

                //self.dolar = self.formated({{ config('dolar')}});
                //var p_costo = {{ isset($articulo->precio_costo) ? $articulo->precio_costo : 0 }}
                //var p_venta = {{ isset($articulo->precio_venta) ? $articulo->precio_venta : 0  }}
                //self.precio_costo = p_costo == 0 ? null : p_costo
                //self.precio_venta = p_venta == 0 ? null : p_venta

            //seteo las categorias
            axios.get('/api/categorias').then(response => {
                self.categorias = response.data.data;
            });
            //seteo las marcas
            axios.get('/api/marcas').then(response => {
                self.marcas = response.data.data;

            });
            self.categoria = $('#categoria_id').val();
            self.marca = $('#marca_id').val();
            }
        }
    </script>