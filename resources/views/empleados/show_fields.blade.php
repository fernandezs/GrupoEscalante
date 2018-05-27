<!-- Id Field -->
{!! Form::label('id', 'Id:') !!}
{!! $empleado->id !!}<br>


<!-- Nombre Field -->
{!! Form::label('nombre', 'Nombre:') !!}
{!! $empleado->nombre !!}<br>


<!-- Fecha Ingreso Field -->
{!! Form::label('fecha_ingreso', 'Fecha Ingreso:') !!}
{!! $empleado->fecha_ingreso->format('d-m-Y') !!}<br>


<!-- Created At Field -->
{!! Form::label('created_at', 'Creado:') !!}
{!! $empleado->created_at->format('d-m-Y')  !!}<br>


<!-- Updated At Field -->
{!! Form::label('updated_at', 'Actualizado por ultima vez:') !!}
{!! $empleado->updated_at->format('d-m-Y')  !!}<br>



