<div class="row">
    <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-globe"></i> {{ config('app.name') }}
            <small class="pull-right">Fecha: {{ $deuda->created_at->format('d/m/Y') }}</small>
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
            <strong>{{ $deuda->cliente->nombre }}</strong><br>
            {{ $deuda->cliente->direccion }}<br>
            Telefono: (011) {{ $deuda->cliente->telefono }}<br>
            Email: {{ $deuda->cliente->email }}
        </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
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
            @foreach($deuda->detalles as $detalle)
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
        
    </div>
    <!-- /.col -->
    <div class="col-xs-6">
        <p class="lead">Monto adeudado {{ $deuda->fecha_cobro != null ? \Carbon\Carbon::now()->format('d/m/Y') : $deuda->fecha_cobro }}</p>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>${{ $deuda->detalles->sum('subtotal') }}</td>
                </tr>
                <tr>
                    <th>Interes ({{ $deuda->interes }}%)</th>
                    <td>${{ ($deuda->interes * 0.01) * $deuda->detalles->sum('subtotal') }}</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td>${{ $deuda->importe_total }}</td>
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
        <a href="{!! route('deudas.index') !!}" class="btn btn-default">Regresar</a>

        <a href="{{ route('pdf.invoice', $deuda->id) }}" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Generar PDF</a>
    </div>
</div>

