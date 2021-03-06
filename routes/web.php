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

$router->get('/', function () use ($router) {
    return "Your lumen App";
});

$router->group(['prefix' => 'api/v1'], function($router) {
    $router->post('car', 'CarController@store');
    $router->put('car/{id}', 'CarController@update');
    $router->delete('car/{id}', 'CarController@destroy');
    $router->get('car', 'CarController@index');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'AuthController@register');

    $router->post('login', 'AuthController@login');

     // Matches "/api/profile
     $router->get('profile', 'UserController@profile');

     // Matches "/api/users/1 
     //get one user by id
     $router->get('users/{id}', 'UserController@singleUser');
 
     // Matches "/api/users
     $router->get('users', 'UserController@allUsers');
});