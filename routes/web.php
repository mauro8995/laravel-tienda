<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
//user
Route::get('/user/register', 'Auth\RegisterController@view_register');
Route::post('/user/users', 'Auth\UserController@getUsers');
Route::post('/user/register', 'Auth\RegisterController@create');

//permison
Route::get('/user/permissons/register', 'Auth\PermissionsController@view_permissions');
Route::post('/user/permissons/register', 'Auth\PermissionsController@create');
Route::get('/user/permissons/register/da', 'Auth\PermissionsController@view_permissions_user');
Route::post('/user/permissons/users', 'Auth\PermissionsController@getPermissions_user');
Route::post('/user/permissons', 'Auth\PermissionsController@getPermissions');
Route::post('/user/permissons/users/register', 'Auth\PermissionsController@insert_permissions_user');

//test
Route::get('/user/test/data', 'Auth\PermissionsController@dataTest');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');


