<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */

Route::get('/', function ()
{
    if(Auth::guest()){
        return View::make('welcome');
    }
    return redirect("home");
});



Route::get('home', 'Controller@index');

/* Route::get('/home', function ()
{
    return view('home');
}); */

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
        'password' => 'Auth\PasswordController'
]);


Route::post('create_spending', 'Spendings@create');
Route::post('create_group', 'GroupsController@create');
