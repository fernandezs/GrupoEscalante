<div class="col-md-8">
    <div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Ultimas reparaciones</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @if(count($listaReparaciones) > 0)
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                <tr>
                    <th>Factuna N°</th>
                    <th>Cliente</th>
                    <th>Maquina</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listaReparaciones as $item)
                    <tr>

                        <td><a href="{{ route('reparaciones.show', $item->id) }}"> #{{ reparacionNro($item->cod_factura) }} </a></td>
                        <td>{{ $item->cliente->nombre }}</td>
                        <td>{{ $item->articulo->nombre }}</td>
                        <td>
                            @if($item->estado == 'INICIADO')
                                <span class="label label-info">{{ $item->estado }}</span>
                            @elseif($item->estado == 'EN TALLER')
                                <span class="label label-warning">{{ $item->estado }}</span>
                            @elseif($item->estado == 'ENTREGADO')
                                <span class="label label-success">{{ $item->estado }}</span>
                            @else
                                <span class="label label-default">{{ $item->estado }}</span>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @else
        <h3>No hay ninguna reparacion registrada!</h3>
        <small>Crea una desde el munú</small>
        @endif
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <a href="{{ route('reparaciones.create')}}" class="btn btn-sm btn-default btn-flat pull-left">Nueva reparacion</a>
        <a href="{{ route('reparaciones.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Ver todas</a>
    </div>
    <!-- /.box-footer -->

</div>
</div>