<div class="col-md-4 foto" id="foto">
    <!-- Foto Field -->
    <div class="form-group">
        {!! Form::label('foto', 'Foto:') !!}
        <input id="files" name="foto" type="file">
    </div>
</div>
<div class="col-md-8">
    <!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese un nombre']) !!}
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
<div class="form-group col-sm-6">
<categoria :categoria_id="{{isset($articulo) ? $articulo->categoria->id : 0 }}"><categoria>
</div>
<div class="form-group col-sm-6">
    <marca :marca_id="{{isset($articulo) ? $articulo->marca->id : 0 }}"></marca>
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
            usd <i class="fa fa-dollar"></i>
        </span>
        {!! Form::number('precio_costo', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'dólares']) !!}
    </div>

</div>

<!-- Precio Venta Field -->
<div class="form-group col-sm-3">
    {!! Form::label('precio_venta', 'Precio Venta:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-dollar"></i>
        </span>
        {!! Form::number('precio_venta', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'en pesos']) !!}
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

<!-- Submit Field -->
<div class="form-group col-sm-12 pull-right">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('articulos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
</div>



@if(isset($articulo))
<input type="hidden" id="categoria_id" value="{{$articulo->categoria_id}}">
<input type="hidden" id="marca_id" value="{{$articulo->marca_id}}">
<input type="hidden" id="foto_url" value="{{Storage::url($articulo->foto)}}">
@endif

@push('scripts')
<script>
    $(document).ready(function () {
        if($(window).width() > 650) {
            $(".foto").height(300);
        }

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
        var baseUrl = {!! json_encode(url('/')) !!};
        var url = $("#foto_url").val();
        if(url == null) {
             fullUrl = baseUrl + '/storage/product.png';
             foto_nombre = "default.png"
        }
        else {
            fullUrl = baseUrl + url;
            foto_nombre = $("#nombre").val();
        }
        
        $input.fileinput({
            showUpload: false, // hide upload button
            showRemove: true, // hide remove button
            language: 'es',
            initialPreview : [
            '<img class="file-preview-image kv-preview-data" src="'+ fullUrl +'">'],
            initialPreviewFileType : 'image',
            initialPreviewConfig : [
                { caption : foto_nombre }
            ],
//            minFileCount: 1,
//            maxFileCount: 5,
            allowedFileExtensions: ["png","bmp","gif","jpg","pdf",'jpeg']
        });
    })
</script>

@endpush