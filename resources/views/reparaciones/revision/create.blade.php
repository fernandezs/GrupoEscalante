@extends('adminlte::layouts.app')
@include('layouts.vue')
@include('layouts.axios')
@include('layouts.plugins.select2')
@include('layouts.plugins.sweetalert2')
@section('htmlheader_title')
	Revision de la reparacion
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Agregue todos los campos necesarios
        </h1>
    </section>
    <div class="content" id="deudas">
            @include('adminlte-templates::common.errors')            
                {!! Form::model($reparacion, ['route' => ['reparaciones.update', $reparacion->id], 'method' => 'patch']) !!}
                    
                    @include('reparaciones.revision.fields')
                
                {!! Form::close() !!}
    </div>
@endsection