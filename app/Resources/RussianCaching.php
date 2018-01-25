<?php

namespace App\Resources;

use Cache;

class RussianCaching
{
    protected static $keys = [];

    public static function setUp($model, $key = null)
    {
        ob_start();
        static::$keys[] = $key = self::normalizeCacheKey($model, $key);
        return Cache::has($key);
    }

    public static function tearDown()
    {
        $key = array_pop(static::$keys);
        $html = ob_get_clean();
        return Cache::remember($key, 1440, function() use ($html){
            return $html;
        });
    }

    protected static function normalizeCacheKey($model, $key)
    {
        // If the user wants to provide their own cache
        // key, we'll opt for that.
        if (is_string($model) || is_string($key)) {
            return is_string($model) ? $model : $key;
        }
        // Otherwise we'll try to use the item to calculate
        // the cache key, itself.
        if (is_object($model) && method_exists($model, 'getCacheKey')) {
            return $model->getCacheKey();
        }
        // If we're dealing with a collection, we'll
        // use a hashed version of its contents.
        if ($model instanceof \Illuminate\Support\Collection) {
            return md5($model);
        }
        throw new Exception('Could not determine an appropriate cache key.');
    }
}
