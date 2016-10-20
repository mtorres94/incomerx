<?php

namespace Sass\DataTables;

use Yajra\Datatables\Services\DataTable;

abstract class CustomDataTable extends DataTable
{
    public function groupButton ($obj, $route, $prints)
    {
        $btn_options =  '<div class="btn-group" role="group">';
        $btn_options .= '<a href="javascript:void(0)" type="button" class="btn btn-default btn-xs" onclick="addSubtab(\''.trans('panel.edit').' '.strtoupper($obj->code).'\', \''.route($route.'.edit', $obj).'\')"><i class="icon-pencil3"></i></a>';
        $btn_options .= '<a href="javascript:void(0)" type="button" class="btn btn-default btn-xs btn-delete" data-remote="'.route($route.'.destroy', $obj).'"><i class="icon-cup"></i></a>';

        if (is_array($prints) && !is_null($prints))
        {
            if (count($prints) > 0)
            {
                $btn_options .= '<div class="btn-group" role="group">';
                $btn_options .= '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                $btn_options .= '<i class="icon-print"></i>  <span class="caret"></span>';
                $btn_options .= '</button>';
                $btn_options .= '<ul class="dropdown-menu">';
                foreach ($prints as $print)
                {
                    $btn_options .= '<li><a href="'.route($print['route'], [str_random(60), $obj]).'" target="_blank"><i class="'.$print['icon'].'"></i><span>'.$print['name'].'</span></a></li>';
                }
                $btn_options .= '</ul>';
                $btn_options .= '</div>';
            }
        }

        $btn_options .= '</div>';

        return $btn_options;
    }
}