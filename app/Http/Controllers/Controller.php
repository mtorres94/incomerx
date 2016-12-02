<?php

namespace Sass\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public static function updateOpenStatus ($model)
    {
        $model->user_open_id = Auth::user()->id;
        return $model;
    }

    public static function updateCloseStatus ($model)
    {
        $model->user_open_id = 0;
        return $model;
    }
}
