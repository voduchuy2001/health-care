<?php

namespace App\Helpers;

class ToastrHelper
{
    public static function success(string $type = null, string $message = null)
    {
        return toastr()->success($type . ' ' . $message . ' thành công');
    }

    public static function error(string $type = null, string $message = null)
    {
        return toastr()->error($type . ' ' . $message . ' không thành công');
    }

    public static function warning(string $message = null)
    {
        return toastr()->warning($message);
    }
}
