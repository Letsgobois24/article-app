<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryService
{
    public static function cacheAll()
    {
        return Cache::rememberForever('categories.all', fn() => Category::all());
    }

    public static function clearCache()
    {
        Cache::forget('categories.all');
    }
}
