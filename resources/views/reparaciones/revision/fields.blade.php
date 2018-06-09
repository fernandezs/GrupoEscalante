<input type="hidden" value="{{ $reparacion->id }}" id="reparacion_id
">
<div class="row">
    <div class="col-md-3 col-sm-12">
        <cliente :cliente="{{json_encode($reparacion->cliente)}}"
                 :descripcion="{{json_encode($reparacion->descripcion)}}">
        </cliente>

    </div>
    <div class="col-md-3 col-sm-12">
        <maquina :maquina="{{ json_encode($reparacion->articulo) }}">

        </maquina>
    </div>

    <div class="col-md-3 col-sm-12">
        <reparacion-estados :reparacion_id  ="{{ json_encode($reparacion->id) }}"
                            :listaestados   ="{{ json_encode($estados) }}"
                            :listaempleados ="{{ json_encode($empleados) }}">
        </reparacion-estados>
    </div>

    <div class="col-md-3 col-sm-12">

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