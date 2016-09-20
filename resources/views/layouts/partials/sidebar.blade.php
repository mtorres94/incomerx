<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
        <div class="nav-header">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('images/user-icon-md.png') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i>{{ trans('panel.status') }}</a>
                </div>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">{{ strtoupper(trans('modules.main')) }}</li>
            @foreach (Sass\Module::all() as $module)
                @if ($module->active == 1)
                    <li class="treeview">
                        <a href="javascript:void(0)">
                            <i class="{{ $module->icon }}"></i> <span>{{ trans($module->name) }}</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            @foreach ($module->menus as $menu)
                                @if ($menu->active == 1)
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="{{ $menu->icon }}"></i> <span>{{ trans($menu->name) }}</span> <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu third-level">
                                           @foreach ($menu->options as $option)
                                                @if ($option->active == 1)
                                                    <li><a href="javascript:void(0)" onclick="addTab('{{ trans('panel.main') }}' ,'{{ trans($option->name) }}', '{{ trans($option->name) }}', '{{ empty(trim($option->route)) ? '' : route( $option->route ) }}')"><i class="{{ $option->icon }}"></i> {{ trans($option->name) }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
