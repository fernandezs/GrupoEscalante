@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Deuda
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Factura
            <small>#007612</small>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                    @include('deudas.show_fields')
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
