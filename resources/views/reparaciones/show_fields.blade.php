<div class="row">
    <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-globe"></i> {{ config('app.name') }}
            <small class="pull-right">Fecha: {{ $reparacion->created_at->format('d/m/Y') }}</small>
        </h2>
    </div>
    <!-- /.col -->
</div>
<!-- info row -->
<div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
        De
        <address>
            <strong>{{ config('app.name') }}</strong><br>
            {{ config('direccion') }}<br>
            {{ config('localidad') }}<br>
            Telefono: (011) {{ config('telefono') }}<br>
            Email: {{ config('email') }}
        </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        A
        <address>
            <strong>{{ $reparacion->cliente->nombre }}</strong><br>
            {{ $reparacion->cliente->direccion }}<br>
            Telefono: (011) {{ $reparacion->cliente->telefono }}<br>
            Email: {{ $reparacion->cliente->email }}
        </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <b>Reparacion #{{ $reparacion->id }}</b><br>
        <br>
        <b>Maquina ID:</b> {{ $reparacion->articulo->nombre }}<br>
        <b>Fecha de ingreso:</b> {{ $reparacion->fecha_ingreso }}<br>
        <b>Fecha de egreso:</b> {{ $reparacion->fecha_egreso }}<br>
        <b>Garantia:</b> {{ $reparacion->dias_garantia }}
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- Table row -->
<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Cant</th>
                <th>Producto</th>
                <th>Codigo #</th>
                <th>Descripción</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reparacion->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->articulo->nombre }}</td>
                    <td>{{ $detalle->articulo->cod_articulo }}</td>
                    <td>{{ $detalle->articulo->descripcion }}</td>
                    <td>${{ $detalle->subtotal }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
        <p class="lead">Metodos de pago:</p>
        <img src="{{ asset('img/credit/visa.png') }}" alt="Visa">
        <img src="{{ asset('img/credit/mastercard.png') }}" alt="Mastercard">
        <img src="{{ asset('img/credit/american-express.png') }}" alt="American Express">
        <img src="{{ asset('img/credit/paypal2.png') }}" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
    </div>
    <!-- /.col -->
    <div class="col-xs-6">
        <p class="lead">Monto adeudado {{ $reparacion->created_at->format('d/m/Y') }}</p>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>${{ $reparacion->detalles->sum('subtotal') }}</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td>${{ $reparacion->costo_reparacion }}</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- this row will not appear when printing -->
<div class="row no-print">
    <div class="col-xs-12">
        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        <a href="{!! route('reparaciones.index') !!}" class="btn btn-default">Regresar</a>

        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
        </button>
    </div>
</div>

