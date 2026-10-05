<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

class DashboardCache
{
    public static function clear(): void
    {
        Cache::forget('dashboard_counts');
    }
}