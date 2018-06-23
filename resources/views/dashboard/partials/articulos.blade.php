<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Productos agregados recientemente</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			</button>
			<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		@if(count($listaArticulos) > 0)
		<ul class="products-list product-list-in-box">
			@foreach($listaArticulos as $item)
				<li class="item">
					<div class="product-img">
						<img src="{{ Storage::url($item->foto) }}" alt="Product Image">
					</div>
					<div class="product-info">
						<a href="{{ route('articulos.show', $item->id) }}" class="product-title">{{ $item->nombre }}
							<span class="label label-warning pull-right">${{ $item->precio_venta }}</span></a>
						<span class="product-description">
  							{{ $item->descripcion }}
				 			</span>
					</div>
				</li>
			@endforeach
		</ul>
		@else
		<h3>No hay articulos para mostrar!</h3>
		<small>Agregue uno desde el munú</small>
		@endif
	</div>
	<div class="box-footer clearfix">
            <a href="{{route('articulos.create')}}" class="btn btn-sm btn-default btn-flat pull-left">Nuevo registro</a>
            <a href="{{ route('articulos.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Ver todas</a>
        </div><!-- /.box-footer -->
</div>