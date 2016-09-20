<?php
/**
 * Created by PhpStorm.
 * User: sirmi
 * Date: 04/08/2016
 * Time: 12:18
 */

namespace Sass\Logic\File;

use Carbon\Carbon;

class FileRepository
{
    public static function generate ($file)
    {
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $mime = $file->getClientMimeType();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);

        $filename = self::sanitize($originalNameWithoutExt);
        $allowed_filename = self::createUniqueFilename($filename, $extension);

        return [
            'original_name' => $originalName,
            'temp_name' => $allowed_filename,
            'mime' => $mime,
        ];
    }

    private static function createUniqueFilename($filename, $extension)
    {
        $date = str_replace(["-", ":", " "], "", Carbon::now()->toDateTimeString());
        $file = substr(md5($filename), 0, 21);
        return $date . '_' . $file . '.' . $extension;
    }

    private static function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }
}