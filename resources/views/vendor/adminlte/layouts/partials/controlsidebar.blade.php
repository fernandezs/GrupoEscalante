<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark" :class="{ 'control-sidebar-open' : togle_control_sidebar }">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Dolar Sistema: AR$ {!! config('dolar')!!}</h3>
            <h3 class="control-sidebar-heading">Dólar Hoy</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <div class="container">
                        <iframe style="width: 100%;" width="150px" height="150px" src="https://www.dolarsi.com/cotizador/cotizadorDolarsiFull.php" frameborder="0" scrolling="0" allowfullscreen=""></iframe>
                        <!-- Inicio codigo Dolarhoy.com -->
                    <a target="_blank" href="http://www.dolarhoy.com/" alt="DolarHoy" title="DolarHoy.com" >
                    <img src="http://www.dolaronline.com/" style="width: 140px" height="150px" border="0" alt="DolarHoy.com">
                    </a> 
                <!-- Fin de Dolarhoy.com -->
                <h3 class="control-sidebar-heading">Dólar La Nación</h3>
                    <a href="https://www.lanacion.com.ar/dolar-hoy-t1369" style="color: green;" target="_blank" title="Dólar La Nación">Consultar...</a>
                    </div>
                </li>
                {{--<li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">{{ trans('adminlte_lang::message.birthday') }}</h4>
                            <p>{{ trans('adminlte_lang::message.birthdaydate') }}</p>
                        </div>
                    </a>
                </li>
                --}}
            </ul><!-- /.control-sidebar-menu -->
            {{-- 
            <h3 class="control-sidebar-heading">{{ trans('adminlte_lang::message.progress') }}</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <h4 class="control-sidebar-subheading">
                            {{ trans('adminlte_lang::message.customtemplate') }}
                            <span class="label label-danger pull-right">70%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
            </ul><!-- /.control-sidebar-menu --> --}}

        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">{{ trans('adminlte_lang::message.statstab') }}</div><!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            {{--<form method="post">
                <h3 class="control-sidebar-heading">{{ trans('adminlte_lang::message.generalset') }}</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        {{ trans('adminlte_lang::message.reportpanel') }}
                        <input type="checkbox" class="pull-right" {{ trans('adminlte_lang::message.checked') }} />
                    </label>
                    <p>
                        {{ trans('adminlte_lang::message.informationsettings') }}
                    </p>
                </div><!-- /.form-group -->
            </form>--}}
            {!! Form::model(null, ['route' => ['configurations.update', 6], 'method' => 'patch']) !!}
            <h3 class="control-sidebar-heading">Setear precio del dólar</h3>
                <div class="form-group">
                    {!! Form::label('value', 'Dólar:') !!}
                    {!! Form::text('value', config('dolar'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-block'])!!}
                </div>
            {!! Form::close() !!}
        </div><!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar

<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>