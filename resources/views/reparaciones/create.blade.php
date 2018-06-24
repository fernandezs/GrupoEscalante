@extends('adminlte::layouts.app')
@include('layouts.plugins.select2')
@section('htmlheader_title')
	Crear Reparacion
@endsection

@section('content')
    <section class="content-header">
        <h1>
           <i class="fa fa-edit"></i> Crear Reparacion
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        
            <div class="row">
                {!! Form::open(['route' => 'reparaciones.store']) !!}

                    @include('reparaciones.fields')

                {!! Form::close() !!}

            </div>
    </div>
@endsection
