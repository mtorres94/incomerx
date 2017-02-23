<?php
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