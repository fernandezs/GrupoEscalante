@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Articulo
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{ $articulo->nombre }}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-sm-8 col-md-offset-2">
                    @include('articulos.show_fields')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-8 col-md-offset-2">
            <a href="{!! route('articulos.index') !!}" class="btn btn-default">Regresar</a>
            </div>
        </div>
    </div>
@endsection
