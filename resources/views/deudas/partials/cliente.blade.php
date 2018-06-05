<div class="box box-primary contenedor">
    <div class="box-header with-border">
        <h3 class="box-title">
           <i class="fa fa-user"></i> {{ $deuda->cliente->nombre }}
        </h3>
    </div>
    <div class="box-body">
        <div class="col-md-4">
            <img src="{{ asset('images/clientes/default.jpg') }}" alt="Foto" class="img img-responsive img-thumbnail">
        </div>
        <div class="col-md-8">
            <!-- Cliente Id Field -->
            <i class="fa fa-users"></i> {!! Form::label('cliente_nombre', 'Cliente N°:') !!}
            {!! $deuda->cliente->num_cliente !!}<br>
            <i class="fa fa-address-card"></i> {!! Form::label('cliente_nombre', 'Tipo de cliente:') !!}
            {!! $deuda->cliente->tipo !!}<br>
            <i class="fa fa-phone"></i> {!! Form::label('telefono', 'Telefono:') !!}
            {!! $deuda->cliente->telefono !!}<br>
            <i class="fa fa-truck"></i> {!! Form::label('direccion', 'Direccion:') !!}
            {!! $deuda->cliente->direccion !!}<br>
            <div class="form-group">
                <i class="fa fa-file"></i> {!! Form::label('detalle', 'Breve descripcion:') !!}
                {!! Form::textarea('detalle', null, ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
        </div>
    </div>
</div>