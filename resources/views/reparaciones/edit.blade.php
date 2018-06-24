@extends('adminlte::layouts.app')
@include('layouts.plugins.select2')
@section('htmlheader_title')
	Editar Reparacion
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Editar Reparacion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($reparacion, ['route' => ['reparaciones.update', $reparacion->id], 'method' => 'patch']) !!}

                        @include('reparaciones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection