@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Estados
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Estados</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" href="#myModal">
              <i class="fa fa-plus"></i>
              <span class="hidden-xs hidden-sm">Nuevo</span>
           </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('estados.table')
            </div>
        </div>
    </div>
    @include('estados.formModal')
@endsection

