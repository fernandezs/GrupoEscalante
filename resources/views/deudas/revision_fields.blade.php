<div class="row">
    <div class="col-md-4 col-sm-12">
        <cliente :_cliente=" {{ json_encode($deuda->cliente )}}" :detalle="{{ json_encode($deuda->detalle) }}"></cliente>

    </div>
    <div class="col-md-5 col-sm-12">
        <articulos :listaarticulos="{{ json_encode($articulos)}}"
                   :deuda_id=" {{json_encode($deuda->id)}}">
            
        </articulos>
    </div>

    <div class="col-md-3 col-sm-12">
        <div class="box box-primary contenedor">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-handshake-o"></i> Estado de la deuda
                </h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Estado:</label>
                    {!! Form::select('estado',['PAGADO' => 'PAGADO', 'INPAGO' => 'INPAGO'], $deuda->estado, ['class' => 'form-control'])!!}
                </div>
                <facturacion :valor_interes =" {{ json_encode($deuda->interes)}}"
                            :imp_subtotal  =" {{ json_encode($deuda->detalles->sum('subtotal'))}}"
                            :imp_total     =" {{ json_encode($deuda->importe_total)}}">
                </facturacion>
                
            </div>
            <div class="box-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                <a href="{!! route('deudas.index') !!}" class="btn btn-default">Cancelar</a>
            </div>
            </div>
    </div>    
</div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-cubes"></i> Lista de articulos adeudados
        </h3>
    </div>

    <div class="panel-body">
        <div class="table table-responsive">
            <tabla-deuda-articulos :listadetalles=" {{ json_encode($detalles)}}">
                
            </tabla-deuda-articulos>
        </div>
    </div>
</div>


</div>



@push('scripts')
<!-- <script src="{{ asset('/deudas/main.js')}}"></script> -->
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

    })
</script>
@endpush