<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$router->group(['namespace' => 'App\Http\Controllers\Merchant'], function () use ($router) {
    $router->post('/save-store', ['as' => 'save.stores', 'uses' => 'StoreController@saveStore']);
    $router->post('/save-products', ['as' => 'save.products', 'uses' => 'ProductController@saveProduct']);
    $router->put('/has_vat/product/{id}', ['as' => 'products.hasVat', 'uses' => 'ProductController@updateProductVat']);
    $router->put('/update/settings/{id}', ['as' => 'settings.update', 'uses' => 'SettingController@updateSettings']);
});
