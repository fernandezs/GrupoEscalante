@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Crear Reparacion
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Crear Reparacion
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
