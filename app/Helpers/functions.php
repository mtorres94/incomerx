<?php
if (!function_exists('array_distinct')) {
    function array_distinct ($array)
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