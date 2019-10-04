<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    $user = DB::collection('Discipulos');
    dd($user);
    return $router->app->version();
});

$router->post(
    '/discipulo',
    [
        'as' => 'store',
        'uses' => '\App\Http\Controllers\DiscipuloController@store'
    ]
);

$router->get(
    '/discipulo/{id}',
    [
        'as' => 'show',
        'uses' => '\App\Http\Controllers\DiscipuloController@show'
    ]
);

$router->get(
    '/discipulo',
    [
        'as' => 'index',
        'uses' => '\App\Http\Controllers\DiscipuloController@index'
    ]
);

$router->put(
    '/discipulo/{id}',
    [
        'as' => 'index',
        'uses' => '\App\Http\Controllers\DiscipuloController@update'
    ]
);

$router->delete(
    '/discipulo/{id}/active',
    [
        'as' => 'delete',
        'uses' => '\App\Http\Controllers\DiscipuloController@delete'
    ]
);

$router->get(
    '/discipulo/{code}/active',
    [
        'as' => 'active',
        'uses' => '\App\Http\Controllers\DiscipuloController@active'
    ]
);
