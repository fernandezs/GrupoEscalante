@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Deudas
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Deudas</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('deudas.create') !!}">
              <i class="fa fa-plus"></i>
              <span class="hidden-xs hidden-sm">Agregar Nuev@</span>
           </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('deudas.table')
            </div>
        </div>
    </div>
@endsection
