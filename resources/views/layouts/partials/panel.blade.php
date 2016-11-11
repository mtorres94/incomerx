@extends('layouts._tab')

@section('content')
    <div class="col-md-12 tab-container" id="accordion-v">
        <div class="col-md-2 tab-menu">
            <div class="list-group">
                @foreach(Sass\Module::active()->get() as $module)
                    <a href="javascript:void(0)" class="list-group-item {{ ((Auth::user()->module_id) == $module->id ? 'active': '') }} text-center">
                        <h4 class="{{ $module->icon }} fa-2x"></h4><br/> {{ trans($module->name) }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-10 tab">
            @php
                foreach (Sass\Module::active()->get() as $module)
                {
                    $cnt = 0;
                    $var = '';
                    $len = count($module->menus);
                    $var = '<div class="tab-content'.((Auth::user()->module_id) == $module->id ? ' active': '').'">';
                    $flag = false;

                    foreach ($module->menus as $menu)
                    {
                        if ($menu->active == 1)
                        {
                            $cnt++;
                            $var .= ($cnt % 3 == 1) ? '<div class="row">' : '';
                            $var .= '<div class="col-md-4">';
                            $var .= '<div class="panel panel-default">';
                            $var .= '<div class="panel-heading"><h5><i class="'.$menu->icon.' fa-lg"></i><span>'.trans($menu->name).'</h5></div>';
                            $var .= '<div class="panel-body">';
                            $var .= '<ul id="menu-'.$menu->id.'">';
                            foreach ($menu->options as $option)
                            {
                                if ($option->active == 1)
                                {
                                    $var .= '<li>';
                                    $var .= '<a href="javascript:void(0)" data-main="'.trans('panel.main').'" data-id="'.ucfirst(trans($option->name)).'" data-title="'.ucfirst(trans($option->name)).'" data-route="'.(!empty($option->route) ? route($option->route) : '').'"><i class="'.$option->icon.'"></i>'.trans($option->name).'</a>';
                                    $var .= '</li>';
                                }
                            }
                            $var .= '</ul>';
                            $var .= '</div>';
                            $var .= '</div>';
                            $var .= '</div>';
                            $var .= ($cnt % 3 == 0 || $cnt == $len) ? '</div>' : '';
                        }
                    }
                    $var .= '</div>';
                    echo $var;
                }
            @endphp
        </div>
    </div>
@stop

@section('scripts')
    <!--suppress JSUnresolvedVariable -->
    <script>
        openTab($("#accordion-v"));
    </script>
@endsection