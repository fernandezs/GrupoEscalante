@extends('adminlte::layouts.app')
@include('layouts.vue')
@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('content')
	<div class="content">
		{{--@include('flash::message')--}}
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box box-primary ">
					<div class="box-header">
						<h3 class="box-title">
							Bienvenido
							<b class="text-primary">{{Auth::user()->name}}</b>
							<main>

							</main>
							@usernoops
							<small>No tiene ninguna opción asignada, pida a un administrador que le asigne</small>
							@endusernoops
						</h3>
					</div>
					<div class="box-body">

						<div class="col-lg-3 col sm-6">
							<div class="small-box bg-green">
								<div class="inner">
									<h3>{{ $articulos }}</h3>

									<p>Articulos</p>
								</div>
								<div class="icon">
									<i class="fa fa-linode"></i>
								</div>
								<a href="{{ route('articulos.index') }}" class="small-box-footer">
									Ir al listado <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col sm-6">
							<div class="small-box bg-orange">
								<div class="inner">
									<h3>{{ $clientes }}</h3>

									<p>Clientes</p>
								</div>
								<div class="icon">
									<i class="fa fa-user-circle"></i>
								</div>
								<a href="{{ route('clientes.index') }}" class="small-box-footer">
									Ir al listado <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col sm-6">
							<div class="small-box bg-blue">
								<div class="inner">
									<h3>{{ $reparaciones }}</h3>

									<p>Reparaciones</p>
								</div>
								<div class="icon">
									<i class="fa fa-handshake-o"></i>
								</div>
								<a href="{{ route('reparaciones.index') }}" class="small-box-footer">
									Ir al listado <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col sm-6">
							<div class="small-box bg-maroon">
								<div class="inner">
									<h3>{{ $users }}</h3>

									<p>Usuarios</p>
								</div>
								<div class="icon">
									<i class="fa fa-users"></i>
								</div>
								<a href="{{ route('users.index') }}" class="small-box-footer">
									Ir al listado <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>


						<!-- Lista de deudores -->


						<!-- Listado de productos -->
						<div class="col-md-4 col-sm-12">

							<div class="box-header with-border">
								<h3 class="box-title">Productos agregados recientemente</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
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
							</div>

							<!-- Fin lista de productos -->


							<!-- /.box-body -->
							<div class="box-footer text-center">
								<a href="{{ route('articulos.index') }}" class="uppercase">Ver todos los articulos</a>
							</div>
							<!-- /.box-footer -->

						</div>


					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection
