<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Contacto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_contacto', 'Nombre Contacto:') !!}
    {!! Form::text('nombre_contacto', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Pagina Web Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pagina_web', 'Pagina Web:') !!}
    {!! Form::text('pagina_web', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Domicilio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('domicilio', 'Domicilio:') !!}
    {!! Form::text('domicilio', null, ['class' => 'form-control']) !!}
</div>

<!-- Cod Postal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod_postal', 'Cod Postal:') !!}
    {!! Form::number('cod_postal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('proveedores.index') !!}" class="btn btn-default">Cancelar</a>
</div>
