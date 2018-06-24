<div class="col-md-6">
        <div class="box box-primary contenedor">
        <div class="box-header">
        <h3 class="box-title">
        <i class="fa fa-user"></i> Datos del cliente y maquina
        </h3>
    </div>
       <div class="box-body">
         <!-- Cod Factura Field -->
         <div class="form-group col-sm-12">
            {!! Form::label('cod_factura', 'Codigo de Factura:') !!}
            {!! Form::number('cod_factura', $ult_cod_factura, ['class' => 'form-control']) !!}
        </div>

        <!-- Articulo Id Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('articulo_id', 'Articulo:') !!}
            {!! Form::select('articulo_id',$articulos, null, ['class' => 'form-control', 'id' => 'articulos', 'placeholder' => '']) !!}
        </div>

        <!-- Cliente Id Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('cliente_id', 'Cliente:') !!}
            {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control', 'id' => 'clientes', 'placeholder' => '']) !!}
        </div>


        <!-- Fecha Ingreso Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('fecha_ingreso', 'Fecha Ingreso:') !!}
            <div class="input-group">
                {!! Form::date('fecha_ingreso', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                <span class="input-group-addon">
                    <i class="fa fa-calendar-check-o"></i>
                </span>
            </div>
        </div>
       </div>
        
        </div>
    </div>

<div class="col-md-6">
    <div class="box box-primary contenedor">
    <div class="box-header">
    <h3 class="box-title"><i class="fa fa-wrench"></i> Descripcion de la reparacion</h3>
</div>
<div class="box-body">
<!-- Tipo Garantia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_garantia', 'Tipo Garantia:') !!}
    {!! Form::select('tipo_garantia',['GRUPO ESCALANTE' => 'Grupo Escalante','FABRICANTE' => 'Fabricante'], null, ['class' => 'form-control']) !!}
</div>

<!-- Dias Garantia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dias_garantia', 'Dias Garantia:') !!}
    {!! Form::number('dias_garantia', 30, ['class' => 'form-control']) !!}
</div>
<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('detalle', 'Descripcion:') !!}
    {!! Form::textarea('detalle', null, ['class' => 'form-control']) !!}
</div>
</div>
    </div>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('reparaciones.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@push('scripts')

<script>
    $(document).ready(function()
    {
        if($(window).width() > 650)
        {
            var heights = $('.contenedor').map(function()
            {
                 return $(this).height();
            }).get();
            maxHeight = Math.max.apply(null, heights);
            $('.contenedor').height(maxHeight);
        }

        $("#articulos").select2({
            placeholder : 'Seleccione una articulo',
            language : {
                "noResults" : function() {
                    return "No se han encontrar articulos!";
                }
            }
        });
        $("#clientes").select2({
            placeholder : 'Seleccione un cliente',
            language : {
                "noResults" : function() {
                    return "No se han encontrar clientes!";
                }
            }
        });

    })
</script>
@endpush