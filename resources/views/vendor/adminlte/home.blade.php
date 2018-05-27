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
					<div class="box-body">
						<h3 class="box-title">
							Bienvenido
							<b class="text-primary">{{Auth::user()->name}}</b>
							<main>
								<h1>@{{ texto }}</h1>
								<h2 v-text="texto"></h2>

								<input type="text" v-model="nombre">
								<label for="nombre"> @{{ nombre}}</label>
								<hr>
								<ul>
									<li v-for="(pelicula, index) in peliculas">@{{ pelicula }} <button @click="borrarPelicula(index)">Borrar pelicula </button></li>
								</ul>
								<input type="text" v-model="peliculaNueva">
								<button @click="agregarPelicula()">Agregar pelicula</button>
							</main>
							@usernoops
							<small>No tiene ninguna opción asignada, pida a un administrador que le asigne</small>
							@endusernoops
						</h3>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection
@push('scripts')
<script src="{{ asset('/users/main.js')}}"></script>

@endpush