
    <!-- TABLE: LATEST ORDERS -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Últimos morosos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            @if(count($listaDeudas) > 0)
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>Remito Nº</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th class="text-right">Total    </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listaDeudas as $item)
                    <tr>
                        <td><a href="{{ route('deudas.show', $item->id)}}">{{ $item->id }}</a></td>
                        <td>{{ $item->cliente->nombre}}</td>
                        <td>
                            @if($item->estado == 'INPAGO')
                            <span class="label label-danger">{{ $item->estado}}</span>
                            @else
                            <span class="label label-success">{{ $item->estado}}</span>
                            @endif
                        </td>
                        <td>{{ $item->created_at->format('d/m/Y')}}</td>
                        <td class="text-right">${{ $item->importe_total}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
            @else
            <h3>No hay ningun moroso registrado!</h3>
            <small>Cree uno desde el menú</small>
            @endif
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="{{route('deudas.create')}}" class="btn btn-sm btn-default btn-flat pull-left">Nuevo registro</a>
            <a href="{{ route('deudas.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Ver todas</a>
        </div><!-- /.box-footer -->
    </div><!-- /.box -->
