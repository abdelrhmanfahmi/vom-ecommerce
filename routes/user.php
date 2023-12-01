<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$router->group(['namespace' => 'App\Http\Controllers\User'], function () use ($router) {
    $router->post('/save-cart', ['as' => 'save.cart', 'uses' => 'CartController@saveCart']);
    $router->get('/get-total-price', ['as' => 'get.total', 'uses' => 'CartController@getTotalPrice']);
});
