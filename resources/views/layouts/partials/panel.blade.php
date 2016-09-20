@extends('layouts._tab')

@section('content')
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="padding:5px 0;margin-bottom:0;">
    @foreach($modules as $module)
        @if($module->active == 1)
            <div class="panel panel-default panel-main">
                <div class="panel-heading" role="tab" id="{{ 'heading-'.$module->id }}">
                    <h5>
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="{{ '#collapse-'.$module->id }}" aria-expanded="true" aria-controls="{{ 'collapse-'.$module->id }}">
                            {{ trans($module->name) }}
                        </a>
                    </h5>
                </div>
                <div id="{{ 'collapse-'.$module->id }}" class="panel-collapse collapse {{ ($module->id == 1) ? 'in' : '' }}" role="tabpanel" aria-labelledby="{{ 'heading-'.$module->id }}">
                    <div class="panel-body">
                        <?php
                        $cnt = 0;
                        $var = '';
                        $len = count($module->menus);
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
                        ?>
                        {!! $var !!}
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
@stop

@section('scripts')
    <!--suppress JSUnresolvedVariable -->
    <script>
        openTab($("#accordion"));
    </script>
@endsection