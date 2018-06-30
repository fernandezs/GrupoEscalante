<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un nombre']) !!}
</div>

<!-- Cod Articulo Field -->
<div class="form-group col-sm-3">
    {!! Form::label('cod_articulo', 'Código de Articulo:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-barcode"></i>
        </span>
        {!! Form::number('cod_articulo', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('modelo', 'Modelo:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria:') !!}
    <div class="input-group select2-bootstrap-prepend">
        <select name="categoria_id" id="categorias" v-model="categoria" placeholder="" class="form-control" style="width: 100%;">
            <option :value="categoria.id" v-for="categoria in categorias">@{{ categoria.nombre }}</option>
        </select>
        <span class="input-group-btn">
				<a class="btn btn-default" href="#modalCategoria" data-toggle="modal">
				<span class="glyphicon glyphicon-plus"></span> Agregar
      </a>
      </span>
    </div>
</div>


<!-- Marca Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca_id', 'Marca:') !!}
    <div class="input-group select2-bootstrap-prepend">
        <select name="marca_id" id="marcas" v-model="marca" placeholder="" class="form-control" style="width: 100%;">
            <option :value="marca.id" v-for="marca in marcas">@{{ marca.nombre }}</option>
        </select>
        <span class="input-group-btn">
				<a class="btn btn-default" data-toggle="modal" href="#modalMarca">
				    <span class="glyphicon glyphicon-plus"></span> Agregar
                </a>
      </span>
    </div>
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>

<!-- Precio Costo Field -->
<div class="form-group col-sm-3">
    {!! Form::label('precio_costo', 'Precio Costo:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-dollar"></i>
        </span>
        {!! Form::number('precio_costo', null, ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>

</div>

<!-- Precio Venta Field -->
<div class="form-group col-sm-3">
    {!! Form::label('precio_venta', 'Precio Venta:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-dollar"></i>
        </span>
        {!! Form::number('precio_venta', null, ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-3">
    {!! Form::label('cantidad', 'Cantidad en stock:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-th-large"></i>
        </span>
        {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Cantidad Minima Field -->
<div class="form-group col-sm-3">
    {!! Form::label('cantidad_minima', 'Stock Minimo:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-th-large"></i>
        </span>
        {!! Form::number('cantidad_minima', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('proveedores', 'Proveedores:') !!}
    <div class="input-group select2-bootstrap-prepend">
    {!! Form::select('proveedores[]', $proveedores, null, ['class' => 'form-control', 'multiple', 'id' => 'proveedores', 'style' => 'width: 100%;']) !!}
    </div>
</div>

<!-- Nro Cabezal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nro_cabezal', 'Nro Cabezal:') !!}
    {!! Form::number('nro_cabezal', null, ['class' => 'form-control', 'placeholder' => 'Agregue solo si corresponde!']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', ['DISPONIBLE' => 'DISPONIBLE', 'NO DISPONIBLE' => 'NO DISPONIBLE'], null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-12 col-md-12">
    {!! Form::label('foto', 'Foto:') !!}
    <input id="files" name="foto" type="file">
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('articulos.index') !!}" class="btn btn-default">Cancelar</a>
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
                    <input type="text" name="marca" class="form-control" v-model="modalM" id="modalM">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="storeMarca()">Guardar</button>
                <button class="btn" data-dismiss ="modal">Cancelar</button>
            </div>
        </div>
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
                        <input type="text" class="form-control" name="categoria" v-model="modalC" id="modalC">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="storeCategoria()">Guardar</button>
                <button class="btn" data-dismiss ="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    $(function () {

        $("#proveedores").select2({
            placeholder : 'Ingrese uno o mas proveedores...',
            language : {
                "noResults" : function() {
                    return "No se han encontrar resultados!";
                }
            },
            theme : 'bootstrap',
            width : '100%'
        });
        var $input = $("#files");
        $input.fileinput({
            showUpload: false, // hide upload button
            showRemove: false, // hide remove button
            language: 'es',
//            minFileCount: 1,
//            maxFileCount: 5,
            allowedFileExtensions: ["png","bmp","gif","jpg","pdf",'jpeg']
        });
    })
</script>
<script type="text/javascript">

    var vm = new Vue({
        el : "#app",
        data : {
            marca : null,
            categoria : null,
            marcas : [],
            categorias : null,
            modalC : null,
            modalM : null
        },
        methods : {
            //metodo para guardar una marca
            storeMarca() {
                if(this.modalM == null) {
                    alert('Completa este campo!')
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
            //metodo para guardar una categoria
            storeCategoria() {
                if(this.modalC == null) {
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
            }
        },
        mounted() {
            console.log(this.marca);
            let self = this; // ámbito de vue

            //seteo las categorias
            axios.get('/api/categorias').then(response => {
                self.categorias = response.data.data;
            });
            //seteo las marcas
            axios.get('/api/marcas').then(response => {
                self.marcas = response.data.data;

            });


            // inicializas select2
            $('#marcas')
                .select2({
                    placeholder: 'Seleccione una marca...',
                    data: self.marcas, // cargas los datos en vez de usar el loop
                    theme : 'bootstrap',
                    language : {
                        noResults : function() {
                            return 'No se han encontrado resultados!'
                        }
                    }
                })
                // nos hookeamos en el evento tal y como puedes leer en su documentación
                .on('select2:select', function () {
                    var value = $("#marcas").select2('data');
                    // nos devuelve un array

                    // ahora simplemente asignamos el valor a tu variable selected de VUE
                    self.marca = value[0].id
                })

            $('#categorias')
                .select2({
                    placeholder: 'Seleccione una categoría...',
                    data: self.categorias, // cargas los datos en vez de usar el loop
                    theme : 'bootstrap',
                    language : {
                        noResults : function () {
                            return 'No se han encontrado resultados!'
                        }
                    }
                })
                // nos hookeamos en el evento tal y como puedes leer en su documentación
                .on('select2:select', function () {
                    var value = $("#categorias").select2('data');
                    // nos devuelve un array

                    // ahora simplemente asignamos el valor a tu variable selected de VUE
                    self.categoria = value[0].id;
                })
        }
    })
</script>
@endpush