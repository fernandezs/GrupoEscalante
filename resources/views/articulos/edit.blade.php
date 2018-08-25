@extends('adminlte::layouts.app')
@include('layouts.plugins.select2')
@include('layouts.plugins.bootstrap_fileinput')
@section('htmlheader_title')
	Editar Articulo
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Editar Articulo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($articulo, ['route' => ['articulos.update', $articulo->id], 'method' => 'patch','enctype' => "multipart/form-data"]) !!}

                        @include('articulos.fields')

                   {!! Form::close() !!}

               </div>
           </div>
       </div>
   </div>
@endsection