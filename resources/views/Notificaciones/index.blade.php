@extends('adminlte::layouts.app')
@include('layouts.vue')
@include('layouts.axios')
@section('htmlheader_title')
	Notificaciones
@endsection

@section('content')
    <div class="content">
    @include('flash::message')
    @component('components.box')
        @slot('boxTitle')
        <h1>Notificaciones</h1>
        @endslot
        <div class="col-md-10">
        @if($notificaciones->count())
        <div class="list-group">
            @foreach($notificaciones->take(20) as $notificacion)
                <notificacion :notificacion="{{ json_encode($notificacion)}}"></notificacion>
            @endforeach
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-2">
                    {!! Form::open(['route' => 'notificaciones.destroyAll'])!!}
                    {!! Form::submit('Eliminar todas', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close()!!}
                </div>
                <div class="col-md-3">
                    {!! Form::open(['route' => 'notificaciones.readAll', 'method' => 'post'])!!}
                    {!! Form::submit('Marcar todas como leidas', ['class' => 'btn btn-default']) !!}
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
        @else
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"> Sin notificaciones!</h1>
                <p class="lead">No hay notificaciones que mostrar, apareceran aquí cuando exista alguna!</p>
            </div>
        </div>
        @endif
        </div>
    @endcomponent
 
    </div>
@endsection


