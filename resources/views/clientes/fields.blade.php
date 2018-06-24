<!-- Num Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_cliente', 'Num Cliente:') !!} 
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-address-card"></i>
        </span>
        {!! Form::number('num_cliente', $ult_num_cliente, ['class' => 'form-control', 'readonly']) !!}
    </div>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-user"></i>
        </span>
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-phone"></i>
        </span>
        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-envelope"></i>
        </span>
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Doc Tipo Field -->
<div class="form-group col-sm-6 col-md-2">
    {!! Form::label('doc_tipo', 'Doc Tipo:') !!}
    {!! Form::select('doc_tipo',[ 'DNI' => 'DNI', 'CUIT' => 'CUIT', 'CEDULA' => 'CEDULA'], null, ['class' => 'form-control', 'id' => 'doc_tipo']) !!}
</div>

<!-- Doc Numero Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('doc_numero', 'Doc Numero:') !!}
    {!! Form::text('doc_numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-address-book"></i>
        </span>
        {!! Form::select('tipo', ['Consumidor Final' => 'Consumidor Final', 'Empleado' => 'Empleado', 'Monotributista' => 'Monotributista', 'Responsable Inscripto' => 'Responsable Inscripto', 'Revendedor' => 'Revendedor', 'Comerciante' => 'Comerciante', 'Gremio' => 'Gremio'], null, ['class' => 'form-control', 'id' => 'tipo']) !!}
    </div>
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancelar</a>
</div>
