<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 28/10/2016
 * Time: 10:39
 */

namespace Sass\Logic\Common;

class CommonFunctions
{
    public static function replaceId ($id, $line, $array, $replace)
    {
        $keys = array_keys($array, $line);
        foreach ($keys as $key)
        {
            $replace[$key] = $id;
            //var_dump([$keys, $key, $replace, $id]);
        }
        return $replace;
    }
}