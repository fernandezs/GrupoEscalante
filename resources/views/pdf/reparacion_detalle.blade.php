<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle de Reparacion</title>
    <link rel="stylesheet" href="{{ asset('bower/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <style>
    hr {
        border-width: 2px;
        border-color: black;    
    }
    .table-nonfluid {
        width: auto !important;
    }
    </style>
    
    <h2><strong><i class="fa fa-globe" style="margin-top:7px"></i>  {{ config('app.name') }}</strong></h2>
    {{ config('direccion') }}<br>
    {{ config('localidad') }}<br>
    Telefono: (011) {{ config('telefono') }}<br>
    Email: {{ config('email') }}
    <hr>
    <div class="row">
        <div class="col-xs-4">
            <strong>Cliente</strong> <br>
            {{ $reparacion->cliente->nombre}} <br>
            Telefono: {{ $reparacion->cliente->telefono}}
        </div>
        <div class="col-xs-4">
            <strong>N° de Orden</strong><br>
            Fecha de ingreso<br>
            Fecha de egreso<br>
        </div>
        <div class="col-xs-4">
            <strong>{{ $reparacion->cod_factura}}</strong><br>
            {{ $reparacion->created_at->format('d-m-Y') }}<br>
            {{ $reparacion->fecha_egreso != "" ? $reparacion->fecha_egreso->format('d-m-Y') : "" }}<br>
        </div>
    </div>
<hr>
<br>
<div class="row">
    <div class="col-xs-12">
            <table class="table table-nonfluid">
                    <thead>
                        <tr>
                            <th scope="col">Cant</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Codigo #</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reparacion->detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->cantidad }}</td>
                                <td width="150px">{{ str_limit($detalle->articulo->nombre, 20) }}</td>
                                <td>{{ $detalle->articulo->cod_articulo }}</td>
                                <td width="330px">{{ str_limit($detalle->articulo->descripcion, 50) }}</td>
                                <td>${{ $detalle->subtotal }}</td>
                            </tr>
                        @endforeach
                        <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th><span class="pull-right">Subtotal:</span></th>
                                <td>${{ $reparacion->detalles->sum('subtotal') }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th><span class="pull-right">Total:</span></th>
                                <td>${{ $reparacion->costo_reparacion }}</td>
                            </tr>
                    </tbody>
                </table>
    </div>
</div>
    
</body>

</html>