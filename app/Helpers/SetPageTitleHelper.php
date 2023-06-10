<?php

namespace App\Helpers;

class SetPageTitleHelper
{
    protected static $title = [];

    public static function setTitle(string $title = null)
    {
        self::$title = compact('title');
    }

    public static function getTitle()
    {
        return self::$title;
    }
}
