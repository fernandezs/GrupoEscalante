<!-- Id Field -->
{!! Form::label('id', 'Id:') !!}
{!! $articulo->id !!}<br>


<!-- Cod Articulo Field -->
{!! Form::label('cod_articulo', 'Cod Articulo:') !!}
{!! $articulo->cod_articulo !!}<br>


<!-- Categoria Id Field -->
{!! Form::label('categoria_id', 'Categoria:') !!}
{!! $articulo->categoria_id !!}<br>


<!-- Nombre Field -->
{!! Form::label('nombre', 'Nombre:') !!}
{!! $articulo->nombre !!}<br>


<!-- Descripcion Field -->
{!! Form::label('descripcion', 'Descripcion:') !!}
{!! $articulo->descripcion !!}<br>


<!-- Marca Id Field -->
{!! Form::label('marca_id', 'Marca:') !!}
{!! $articulo->marca_id !!}<br>

<!-- Proveedores Field -->
{!! Form::label('proveedores', 'Proveedores:') !!}
@foreach($articulo->proveedores as $proveedor)
    {{ $proveedor->nombre}}
@endforeach
<br>

<!-- Precio Costo Field -->
{!! Form::label('precio_costo', 'Precio Costo:') !!}
{!! $articulo->precio_costo !!}<br>


<!-- Precio Venta Field -->
{!! Form::label('precio_venta', 'Precio Venta:') !!}
{!! $articulo->precio_venta !!}<br>


<!-- Cantidad Field -->
{!! Form::label('cantidad', 'Cantidad:') !!}
{!! $articulo->cantidad !!}<br>


<!-- Cantidad Minima Field -->
{!! Form::label('cantidad_minima', 'Cantidad Minima:') !!}
{!! $articulo->cantidad_minima !!}<br>


<!-- Foto Field -->
{!! Form::label('foto', 'Foto:') !!}
<img src="{{ Storage::url($articulo->foto)}}" alt="" height =100px> <br>

<!-- Nro Cabezal Field -->
{!! Form::label('nro_cabezal', 'Nro Cabezal:') !!}
{!! $articulo->nro_cabezal !!}<br>


<!-- Estado Field -->
{!! Form::label('estado', 'Estado:') !!}
{!! $articulo->estado !!}<br>


<!-- Created At Field -->
{!! Form::label('created_at', 'Createdo:') !!}
{!! $articulo->created_at->format('d-m-Y')  !!}<br>


<!-- Updated At Field -->
{!! Form::label('updated_at', 'Actualizado:') !!}
{!! $articulo->updated_at->format('d-m-Y') !!}<br>


<!-- Deleted At Field -->
{!! Form::label('deleted_at', 'Deleted At:') !!}
{!! $articulo->deleted_at !!}<br>


