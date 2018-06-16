


<div class="form-group col-md-6">
    <!-- Cod Articulo Field -->
    {!! Form::label('cod_articulo', 'Codigo Articulo:') !!}
    {!! $articulo->cod_articulo !!}
</div>

<div class="form-group col-md-6">
    <!-- Categoria Id Field -->
    {!! Form::label('categoria_id', 'Categoria:') !!}
    {!! $articulo->categoria->nombre !!}
</div>



<div class="form-group col-md-6">
    <!-- Nombre Field -->
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! $articulo->nombre !!}

</div>




<div class="form-group col-md-6">
    <!-- Marca Id Field -->
    {!! Form::label('marca_id', 'Marca:') !!}
    {!! $articulo->marca->nombre !!}
</div>

<div class="form-group col-md-6">
    <!-- Proveedores Field -->
    {!! Form::label('proveedores', 'Proveedores:') !!}
    <ul class="list-group">
        @foreach($articulo->proveedores as $proveedor)
            <a href="{{ route('proveedores.show', $proveedor->id) }}" class="badge badge-secondary">{{ $proveedor->nombre }}</a>
        @endforeach
    </ul>

</div>

<div class="form-group col-sm-6">
    <!-- Precio Costo Field -->
    {!! Form::label('precio_costo', 'Precio Costo:') !!}
    {!! $articulo->precio_costo !!}

</div>


<div class="form-group col-md-6">
    {!! Form::label('precio_venta', 'Precio Venta:') !!}
    {!! $articulo->precio_venta !!}
</div>


<div class="form-group col-md-6">
    <!-- Cantidad Field -->
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! $articulo->cantidad !!}

</div>

<div class="form-group col-md-6">
    <!-- Cantidad Minima Field -->
    {!! Form::label('cantidad_minima', 'Cantidad Minima:') !!}
    {!! $articulo->cantidad_minima !!}
</div>


<!-- Foto Field -->

<div class="form-group col-md-12">
    <img class="img img-responsive img-thumbnail" src="{{ Storage::url($articulo->foto)}}" alt="" height =100px>
</div>
<div class="form-group col-md-12">
    <!-- Descripcion Field -->
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $articulo->descripcion !!}</p>
</div>

<!-- Nro Cabezal Field -->
<div class="form-group col-md-6">
    <div class="form-group">
        {!! Form::label('nro_cabezal', 'Nro Cabezal:') !!}
        {!! $articulo->nro_cabezal !!}
    </div>
</div>


<div class="form-group col-md-6">
    <!-- Estado Field -->
    <div class="form-group">
        {!! Form::label('estado', 'Estado:') !!}
        {!! $articulo->estado !!}
    </div>
</div>


<div class="form-group col-md-6">
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Createdo:') !!}
        {!! $articulo->created_at->format('d-m-Y')  !!}
    </div>

</div>

<div class="form-group col-md-6">
        <!-- Updated At Field -->
    {!! Form::label('updated_at', 'Actualizado:') !!}
    {!! $articulo->updated_at->format('d-m-Y') !!}
</div>



