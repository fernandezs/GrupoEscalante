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
    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'id' => 'categorias', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
</div>


<!-- Marca Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca_id', 'Marca:') !!}
    {!! Form::select('marca_id',$marcas, null, ['class' => 'form-control', 'id' => 'marcas', 'placeholder' => '', 'style' => 'width: 100%;']) !!}
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
    {!! Form::select('proveedores[]', $proveedores, null, ['class' => 'form-control', 'multiple', 'id' => 'proveedores', 'style' => 'width: 100%;']) !!}
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





@push('scripts')
<script>
    $(function () {
        $("#rols").select2();
        $("#categorias").select2({
            placeholder : 'Seleccione una categoria',
            language : {
                "noResults" : function() {
                    return "No se han encontrar resultados!";
                }
            }
        });
        $("#marcas").select2({
            placeholder : 'Seleccione una marca...',
            language : {
                "noResults" : function() {
                    return "No se han encontrar resultados!";
                }
            }
        });
        $("#proveedores").select2({
            placeholder : 'Ingrese uno o mas proveedores...',
            language : {
                "noResults" : function() {
                    return "No se han encontrar resultados!";
                }
            }
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
@endpush