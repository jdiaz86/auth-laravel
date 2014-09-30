<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('candidates/{slug}/{id}', ['as' => 'category', 'uses' => 'CandidatesController@category']);

//lo primero es lo que aparece en la URL
//as -> es el nombre de la ruta

Route::get('{slug}/{id}', ['as' => 'candidate', 'uses' => 'CandidatesController@show']);

Route::get('sign-up',['as' => 'sign_up', 'uses' => 'UsersController@signUp']);

Route::post('sign-up',['as' => 'register', 'uses' => 'UsersController@register']);

Route::post('login',['as' => 'login', 'uses' => 'AuthController@login']);

Route::get('logout',['as' => 'logout', 'uses' => 'AuthController@logout']);



Route::get('account',['as' => 'account', 'uses' => 'UsersController@account']);

Route::put('account',['as' => 'update_account', 'uses' => 'UsersController@updateAccount']);


Route::get('profile',['as' => 'profile', 'uses' => 'UsersController@profile']);

Route::put('profile',['as' => 'update_profile', 'uses' => 'UsersController@updateProfile']);


//para importar rutas de un archivo, y asi organizar
// require(__DIR__ . '/path/to/fileRoute.php')

/*Route::group(['before' => 'auth'], function() {
    //All routes in here will be check if user is Auth.

    //puede haber otro grupo de rutas aca, ej
    //is_admin filter must be defined in global.php
    //Route::group(before=>is_admin)


});*/