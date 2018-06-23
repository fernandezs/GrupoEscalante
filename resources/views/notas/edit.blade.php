@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Editar Nota
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Editar Nota
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nota, ['route' => ['notas.update', $nota->id], 'method' => 'patch']) !!}

                        @include('notas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection