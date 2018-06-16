@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Reparacion
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Reparacion
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group col-sm-12">
                @include('reparaciones.show_fields')
                </div>
            </div>
        </div>

    </div>
@endsection
