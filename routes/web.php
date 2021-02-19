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
    return $router->app->version();
});


$router->group(['prefix' => 'user'], function () use ($router) {
      $router->post('add-user', 'UserController@store');
      $router->get('users', 'UserController@index');
      $router->get('users/{id}', 'UserController@show');
      $router->put('update-user/{id}', 'UserController@update'); 
      $router->delete('delete-user/{id}', 'UserController@destroy'); 
});

$router->group(['prefix' => 'travel'], function () use ($router) {
      $router->post('add-travel', 'TravelController@store');
      $router->get('travels', 'TravelController@index');
      $router->get('travels/{id}', 'TravelController@show');
      $router->put('update-travel/{id}', 'TravelController@update'); 
      $router->delete('delete-travel/{id}', 'TravelController@destroy'); 
});


$router->group(['prefix' => 'passport'], function () use ($router) {
      $router->post('add-passport', 'PassportController@store');
      $router->get('passports', 'PassportController@index');
      $router->get('passports/{id}', 'PassportController@show');
      $router->put('update-passport/{id}', 'PassportController@update'); 
      $router->delete('delete-passport/{id}', 'PassportController@destroy'); 
});