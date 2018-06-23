<div class="form-group col-sm-9">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('remito_nro', 'Nro de Remito:') !!}
    {!! Form::number('remito_nro', $ultimo_cod_remito, ['class' => 'form-control']) !!}
</div>

<!-- Detalle Field -->
<div class="form-group col-sm-12">
    {!! Form::label('detalle', 'Descripcion :') !!}
    {!! Form::textarea('detalle', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Siguiente', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('deudas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
