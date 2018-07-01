@extends('adminlte::layouts.app')
@include('layouts.plugins.select2')
@include('layouts.plugins.bootstrap_fileinput')
@include('layouts.vue')
@include('layouts.axios')
@section('htmlheader_title')
	Crear Articulo
@endsection

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-edit"></i> Crear nuevo articulo
        </h1>
    </section>
    <div class="content" id="articulo">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'articulos.store','enctype' => "multipart/form-data"]) !!}

                        @include('articulos.fields')

                    {!! Form::close() !!}

                    @include('articulos.modalCategoria')
                    @include('articulos.modalMarca')

                </div>
            </div>
        </div>
    </div>
@endsection


