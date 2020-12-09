<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });
use Illuminate\Support\Str;
$router->get('/', function () use ($router) {
    return Str::random(32);
});


$router->group(['prefix' => env('ROUTE_KEY')], function() use ($router) {
    $router->post('/user','UserController@_getUser');
    $router->post('/insert-user','UserController@_insertUser');
    $router->post('/update-user','UserController@_updateUser');
});

