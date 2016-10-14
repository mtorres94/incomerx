<?php
/**
 * Created by PhpStorm.
 * User: sirmi
 * Date: 03/08/2016
 * Time: 9:50
 */

namespace Sass\DataTables;


use Yajra\Datatables\Services\DataTable;

abstract class CustomDataTable extends DataTable
{
    public function groupButton($obj, $show = null, $edit, $destroy, $pdf = null)
    {
        $btn_options =
            '<div class="btn-options">'.
                '<div class="btn-group">'.
                    '<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
                        'Options <span class="caret"></span>'.
                    '</button>'.
                    '<ul class="dropdown-menu">'.
                        '<li>'.
                            '<a href="javascript:void(0)" onclick="addSubtab(\''.trans('panel.edit').' '.strtoupper($obj->code).'\', \''.route($edit, $obj).'\')"><i class="icon ion-paintbrush"></i><span>Edit</span></a>'.
                        '</li>'.
                        '<li>'.
                            '<a href="javascript:void(0)" data-remote="'.route($destroy, $obj).'" class="btn-delete"><i class="icon ion-trash-b"></i><span>Delete</span></a>'.
                        '</li>'.
                    '</ul>'.
                '</div>'.
            '</div>';

        return $btn_options;
    }
}