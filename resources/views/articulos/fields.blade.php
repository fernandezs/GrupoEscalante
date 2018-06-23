<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un nombre']) !!}
</div>

<!-- Cod Articulo Field -->
<div class="form-group col-sm-3">
    {!! Form::label('cod_articulo', 'Código de Articulo:') !!}
    {!! Form::number('cod_articulo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('modelo', 'Modelo:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria:') !!}
    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'id' => 'categorias', 'placeholder' => '']) !!}
</div>


<!-- Marca Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca_id', 'Marca:') !!}
    {!! Form::select('marca_id',$marcas, null, ['class' => 'form-control', 'id' => 'marcas', 'placeholder' => '']) !!}
</div>

<!-- Precio Costo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_costo', 'Precio Costo:') !!}
    {!! Form::number('precio_costo', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Precio Venta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_venta', 'Precio Venta:') !!}
    {!! Form::number('precio_venta', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad en stock:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Minima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_minima', 'Stock Minimo:') !!}
    {!! Form::number('cantidad_minima', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('proveedores', 'Proveedores:') !!}
    {!! Form::select('proveedores[]', $proveedores, null, ['class' => 'form-control', 'multiple', 'id' => 'proveedores']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-12 col-md-12">
    {!! Form::label('foto', 'Foto:') !!}
    <input id="files" name="foto" type="file">
</div>

<!-- Nro Cabezal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nro_cabezal', 'Nro Cabezal:') !!}
    {!! Form::number('nro_cabezal', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', ['DISPONIBLE' => 'DISPONIBLE', 'NO DISPONIBLE' => 'NO DISPONIBLE'], null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('articulos.index') !!}" class="btn btn-default">Cancelar</a>
</div>





@push('scripts')
<script>
    $(function () {
        $("#rols").select2();
        $("#categorias").select2({
            placeholder : 'Seleccione una categoria'
        });
        $("#marcas").select2({
            placeholder : 'Seleccione una marca...'
        });
        $("#proveedores").select2({
            placeholder : 'Ingrese uno o mas proveedores...'
        });
        var $input = $("#files");
        $input.fileinput({
            {{--uploadUrl: "{{route('api.temp_files.multi_store',Auth::user()->id)}}", // server upload action--}}
            //            uploadAsync: false,
            showUpload: false, // hide upload button
            showRemove: false, // hide remove button
            language: 'es',
//            minFileCount: 1,
//            maxFileCount: 5,
            allowedFileExtensions: ["png","bmp","gif","jpg","pdf",'jpeg']
        });
    })
</script>
@endpush