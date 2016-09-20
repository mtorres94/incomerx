<?php

namespace Sass\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function groupButton($obj, $show, $edit, $destroy){
        return
            '<div class="btn-group">'.
                '<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.
                    'Options <span class="caret"></span>'.
                '</button>'.
                '<ul class="dropdown-menu">'.
                    '<li>'.
                        '<a href="javascript:void(0)" onclick="addSubtab(\''.trans('panel.show').' '.strtoupper($obj->name).'\', \''.route($show, $obj).'\')"><i class="icon ion-more"></i><span>Show</span></a>'.
                    '</li>'.
                    '<li>'.
                        '<a href="javascript:void(0)" onclick="addSubtab(\''.trans('panel.edit').' '.strtoupper($obj->name).'\', \''.route($edit, $obj).'\')"><i class="icon ion-paintbrush"></i><span>Edit</span></a>'.
                    '</li>'.
                    '<li>'.
                        '<a href="javascript:void(0)" data-remote="'.route($destroy, $obj).'" class="btn-delete"><i class="icon ion-trash-b"></i><span>Delete</span></a>'.
                    '</li>'.
                '</ul>'.
            '</div>';
    }
}
