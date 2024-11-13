<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/', 'Blog\HomeController@getHome');
