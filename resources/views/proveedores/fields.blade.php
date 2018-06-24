<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-globe"></i>
        </span>
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Nombre Contacto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_contacto', 'Nombre Contacto:') !!}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-user"></i>
        </span>
    {!! Form::text('nombre_contacto', null, ['class' => 'form-control']) !!}
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

<!-- Pagina Web Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pagina_web', 'Pagina Web:') !!}
     
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-pin"></i>
        </span>
        {!! Form::text('pagina_web', null, ['class' => 'form-control']) !!}
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

<!-- Domicilio Field -->
<div class="form-group col-sm-6 col-md-4">
    {!! Form::label('domicilio', 'Domicilio:') !!} 
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
        {!! Form::text('domicilio', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Cod Postal Field -->
<div class="form-group col-sm-6 col-md-2">
    {!! Form::label('cod_postal', 'Cod Postal:') !!}
    {!! Form::number('cod_postal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('proveedores.index') !!}" class="btn btn-default">Cancelar</a>
</div>

