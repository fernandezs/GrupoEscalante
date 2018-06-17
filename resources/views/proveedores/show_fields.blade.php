<!-- Id Field -->
{!! Form::label('id', 'Id:') !!}
{!! $proveedor->id !!}<br>


<!-- Nombre Field -->
{!! Form::label('nombre', 'Nombre:') !!}
{!! $proveedor->nombre !!}<br>


<!-- Nombre Contacto Field -->
{!! Form::label('nombre_contacto', 'Nombre Contacto:') !!}
{!! $proveedor->nombre_contacto !!}<br>


<!-- Telefono Field -->
{!! Form::label('telefono', 'Telefono:') !!}
{!! $proveedor->telefono !!}<br>


<!-- Pagina Web Field -->
{!! Form::label('pagina_web', 'Pagina Web:') !!}
{!! $proveedor->pagina_web !!}<br>


<!-- Email Field -->
{!! Form::label('email', 'Email:') !!}
{!! $proveedor->email !!}<br>


<!-- Domicilio Field -->
{!! Form::label('domicilio', 'Domicilio:') !!}
{!! $proveedor->domicilio !!}<br>


<!-- Cod Postal Field -->
{!! Form::label('cod_postal', 'Codigo Postal:') !!}
{!! $proveedor->cod_postal !!}<br>


<!-- Created At Field -->
{!! Form::label('created_at', 'Creado:') !!}
{!! $proveedor->created_at->format('d/m/Y') !!}<br>


<!-- Updated At Field -->
{!! Form::label('updated_at', 'Actualizado:') !!}
{!! $proveedor->updated_at->format('d/m/Y') !!}<br>



