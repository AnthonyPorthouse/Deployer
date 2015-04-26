<?php

/** @var \Illuminate\Routing\Router $route */
$route = Route::getFacadeRoot();
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Landing Page
$route->get('/', 'WelcomeController@index');

// Auth Routes
$route->group([], function ($route) {
    $route->get('redirect', [
        'as' => 'redirect',
        'uses' => 'AuthController@githubLogin',
    ]);
    $route->get('login', [
        'as' => 'login',
        'uses' => 'AuthController@auth',
    ]);
    $route->get('logout', [
        'as' => 'logout',
        'uses' => 'Auth\AuthController@getLogout',
    ]);
});

// Authenticated User Routes
$route->group(['middleware' => 'auth'], function($route) {
    $route->get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

    $route->group(['prefix' => 'repository'], function ($route) {
        $route->get('add', [
            'as' => 'repository.add',
            'uses' => 'RepositoryController@getAdd',
        ]);
        $route->put('add', [
            'as' => 'repository.add',
            'uses' => 'RepositoryController@putAdd',
        ]);
    });
});
