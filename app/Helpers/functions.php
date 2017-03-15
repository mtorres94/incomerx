<?php
if (!function_exists('uftrans'))
{
    function uftrans($trans)
    {
        return ucfirst(trans($trans));
    }
}
if (!function_exists('array_distinct')) {
    function array_distinct($array)
    {
        $tmp = [];
        foreach ($array as $a) {
            if (!in_array($a, $tmp)) {
                $tmp[] = $a;
            }
        }
        return $tmp;
    }
}
if (!function_exists('format_text')) {
    function format_text($text) {
        return trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $text));
    }
}
if (!function_exists('report_route')) {
    function report_route($route, $type, $id) {
        return route($route, ['_token' => str_random(120), '_type' => $type, '_id' => $id]);
    }
}
if (!function_exists('check_text')) {
    function check_text($var, $text) {
        return $var > 0 ? strtoupper($text) : '';
    }
}
if (!function_exists('generate_code')) {
    function generate_code($model, $field, $var) {
        $array = explode(" ", $var);
        $code = count($array) == 1 ? substr($array[0], 0, 6) : substr($array[0], 0, 3).substr($array[1], 0, 3);
        $flag = $model::where($field, $code)->exists();
        $cnt = 0; $tmp = null;
        while ($flag) {
            $cnt++;
            $tmp = $code.$cnt;
            $flag = $model::where($field, $tmp)->exists();
        }
        return is_null($tmp) ? $code : $tmp;
    }
}
if (!function_exists('fk')) {
    function fk($array) {
        return array_keys($array)[0];
    }
}
if (!function_exists('format_array')) {
    function format_array($array) {
        $x = []; $elements = count($array[fk($array)]);
        for ($i = 0; $i < $elements; $i++){
            foreach ($array as $key => $value) {
                $val = [$key => $value[$i]];
                $x[$i] = isset($x[$i]) ? array_merge($x[$i], $val) : $val;
            }
        }
        return $x;
    }
}