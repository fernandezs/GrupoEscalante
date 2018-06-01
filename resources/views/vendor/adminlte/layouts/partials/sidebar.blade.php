<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        {{--<!-- Sidebar user panel (optional) -->--}}
        <!--
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="#" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <!--
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif
        -->

        {{--<!-- search form (Optional) -->--}}
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        {{--<!-- /.search form -->--}}

        <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <!-- Optionally, you can add icons to the links -->
                <li class=""><a href="{{ url('home') }}"><i class='fa fa-dashboard'></i> <span>{{ trans('adminlte_lang::message.dashboard') }}</span></a></li>
            </ul><!-- /.sidebar-menu -->
            {{--Si el usuario logueado contiene el rol con id 1=administrador--}}
            @useradmin
                {!! Menu::render(OptionMenu::orderBy('orden')->get()) !!}
            @else
                {!! Menu::render(Auth::user()->opciones()->orderBy('orden')->get()) !!}
            @enduseradmin
    </section>
    <!-- /.sidebar -->
</aside>