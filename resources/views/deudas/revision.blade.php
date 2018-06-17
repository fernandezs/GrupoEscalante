@extends('adminlte::layouts.app')
@push('vue-app')
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
@endpush
@section('htmlheader_title')
	Crear Deuda
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Agregue todos los campos necesarios
        </h1>
    </section>
    <div class="content" id="deudas">
            @include('adminlte-templates::common.errors')            
                {!! Form::model($deuda, ['route' => ['deudas.update', $deuda->id], 'method' => 'patch']) !!}
                    
                    @include('deudas.revision_fields')
                
                {!! Form::close() !!}
    </div>
@endsection