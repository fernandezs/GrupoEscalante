@extends('adminlte::layouts.app')
@include('layouts.plugins.select2')
@section('htmlheader_title')
	Crear Cliente
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Crear Cliente
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'clientes.store']) !!}

                        @include('clientes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $("#tipo").select2();
        $("#doc_tipo").select2();
    });
</script>
@endpush
