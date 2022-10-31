<?php
/**
 * Created by PhpStorm.
 * User: umid
 * Date: 2/9/21
 * Time: 8:23 PM
 */

namespace App\Results;


class ResultCache
{
    /** @var array */
    private static $cache = [];

    public static function resolve(string $class, \Closure $closure): array
    {
        if (!isset(self::$cache[$class])) {
            self::$cache[$class] = $closure();
        }

        return self::$cache[$class];
    }
}
