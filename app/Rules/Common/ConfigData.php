<?php

namespace App\Rules\Common;

class ConfigData
{
    private static $config = null;

    private static $baseDir = "";

    public static function getConfig()
    {
        return self::$config;
    }

    public static function baseDir()
    {
        if (self::$baseDir == "") {
            self::$baseDir = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
        }
        return self::$baseDir;
    }
}
