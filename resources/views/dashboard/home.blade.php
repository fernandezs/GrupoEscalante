@extends('adminlte::layouts.app')
@include('layouts.vue')
@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
    Panel de Control
@endsection
@section('content')
    <div class="content">
        @include('dashboard.partials.row2')
        @include('dashboard.partials.row1')
    </div>
@endsection
