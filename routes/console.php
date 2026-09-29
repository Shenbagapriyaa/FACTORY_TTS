<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about:textile', function () {
    $this->info('Textile Production Management module is installed.');
})->purpose('Show module information');
