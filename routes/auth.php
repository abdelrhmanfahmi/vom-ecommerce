<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$router->group([ 'namespace' => 'App\Http\Controllers\Auth'], function () use ($router) {
    $router->post('{type}/login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
    $router->get('/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout'])->middleware('auth:api');
});
