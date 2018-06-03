@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Editar Estado
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Editar Estado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estado, ['route' => ['estados.update', $estado->id], 'method' => 'patch']) !!}

                        @include('estados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection