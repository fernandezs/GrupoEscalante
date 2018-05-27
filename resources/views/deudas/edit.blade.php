@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Editar Deuda
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Editar Deuda
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deuda, ['route' => ['deudas.update', $deuda->id], 'method' => 'patch']) !!}

                        @include('deudas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection