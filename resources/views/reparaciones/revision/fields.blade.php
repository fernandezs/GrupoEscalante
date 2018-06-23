<input type="hidden" value="{{ $reparacion->id }}" id="reparacion_id
">
<input type="hidden" value="{{ $reparacion->cod_factura }}" name="cod_factura">
<div class="row">
    <div class="col-md-4">
        @include('reparaciones.revision.cliente')
    </div>

    <div class="col-md-4">
        <maquina :articulo="{{ json_encode($reparacion->articulo) }}">

        </maquina>
    </div>



    <div class="col-md-4 col-sm-12">
        <div class="box box-primary contenedor">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-calendar-check-o"></i> Revision General</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <reparacion-estados :reparacion_id  ="{{ json_encode($reparacion->id) }}"
                                        :listaestados   ="{{ json_encode($estados) }}"
                                        :listaempleados ="{{ json_encode($empleados) }}">
                    </reparacion-estados>
                </div>
                <div class="form-group">
                    <articulos-reparacion :reparacion_id="{{ json_encode($reparacion->id)}}"
                                          :listaarticulos=" {{ json_encode($articulos)}}"></articulos-reparacion>

                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Guardar">
                    <a href="{{ route('reparaciones.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-cubes"></i> Lista de repuestos
                    </h3>
                </div>

                <div class="box-body">
                    <div class="table table-responsive">
                        <tabla-reparacion-articulos :listadetalles=" {{ json_encode($detalles)}}"></tabla-reparacion-articulos>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <reparacion-estados-tabla :reparacion_id="{{ json_encode($reparacion->id) }}" :listaestados="{{ json_encode($estadosReparacion) }}"></reparacion-estados-tabla>
        </div>
        
        
    </div>

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

    })
</script>
@endpush