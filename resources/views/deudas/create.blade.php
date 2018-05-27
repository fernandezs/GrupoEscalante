@extends('adminlte::layouts.app')
@include('layouts.vue')
@include('layouts.axios')
@section('htmlheader_title')
	Crear Deuda
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Crear un nuevo deudor
        </h1>
    </section>
    <div class="content" id="deudas">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Primero asigna el clientes
                </h3>
            </div>

            <div class="box-body">
                
                    {!! Form::open(['route' => 'deudas.store']) !!}

                        @include('deudas.fields')

                    {!! Form::close() !!}
                
            </div>
        </div>
    </div>
@endsection
