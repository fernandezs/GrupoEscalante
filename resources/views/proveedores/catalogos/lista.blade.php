@extends('adminlte::layouts.app')
@include('layouts.plugins.bootstrap_fileinput')
@section('htmlheader_title')
	Lista de archivos
@endsection

@section('content')

    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                    @include('proveedores.catalogos.fields')
                    
                </div>
            </div>
        </div>
    </div>
@endsection
