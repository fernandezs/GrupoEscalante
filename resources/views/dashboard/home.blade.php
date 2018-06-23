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


        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Reporte de ventas 2018</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: block;">
                        <div class="row">
                            @include('dashboard.partials.deudas')
                            <div class="col-md-4">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box bg-purple">
                                    <span class="info-box-icon"><i class="fa fa-tags"  style="margin-top: 20px;"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Inventario Neto</span>
                                        <span class="info-box-number">82,003,295.60</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">
                    Productos en stock: 9                  </span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-money" style="margin-top: 20px;"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Ventas 2018</span>
                                        <span class="info-box-number">4,063,708,335.21</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">
                    Facturas emitidas: 325                  </span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-shopping-cart"  style="margin-top: 20px;"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Compras 2018</span>
                                        <span class="info-box-number">278,665,782.54</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">
                    Compras realizadas: 137                  </span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                                <div class="info-box bg-aqua">
                                    <span class="info-box-icon"><i class="fa fa-users"  style="margin-top: 20px;"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Clientes</span>
                                        <span class="info-box-number">186</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">
                   Clientes nuevos: 14                  </span>
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- ./box-body -->
                    <div class="box-footer" style="display: block;">

                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div>

    </div>
@endsection