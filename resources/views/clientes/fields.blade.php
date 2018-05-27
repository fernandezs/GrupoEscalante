<!-- Num Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_cliente', 'Num Cliente:') !!}
    {!! Form::number('num_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Doc Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doc_tipo', 'Doc Tipo:') !!}
    {!! Form::select('doc_tipo',[ 'DNI' => 'DNI', 'CUIT' => 'CUIT', 'CEDULA' => 'CEDULA'], null, ['class' => 'form-control', 'id' => 'doc_tipo']) !!}
</div>

<!-- Doc Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doc_numero', 'Doc Numero:') !!}
    {!! Form::text('doc_numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::select('tipo', ['Consumidor Final' => 'Consumidor Final', 'Empleado' => 'Empleado', 'Monotributista' => 'Monotributista', 'Responsable Inscripto' => 'Responsable Inscripto', 'Revendedor' => 'Revendedor', 'Comerciante' => 'Comerciante', 'Gremio' => 'Gremio'], null, ['class' => 'form-control', 'id' => 'tipo']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancelar</a>
</div>
