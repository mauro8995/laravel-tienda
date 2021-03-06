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

Route::get('/', 'auth\LoginController@view_login');
Route::post('/login/user/otro', 'Auth\LoginController@login');

//Auth::routes();
//user
Route::group(['middleware' => 'login'], function(){
    Route::get('/user/register', 'Auth\RegisterController@view_register');
    Route::post('/user/get', 'Auth\UserController@getUsers');
    Route::post('/user/register', 'Auth\RegisterController@create');

    //permison
    Route::get('/permissons/view', 'Auth\PermissionsController@view_permissions');
    Route::post('/user/permissons/get', 'Auth\PermissionsController@getPermissions');
    Route::post('/user/permissons/register', 'Auth\PermissionsController@create');
    //permiscion user
    Route::get('/user/permissons/view', 'Auth\PermissionsController@view_permissions_user');
    Route::post('/user/permissons/users', 'Auth\PermissionsController@getPermissions_user');
    Route::post('/user/permissons/users/register', 'Auth\PermissionsController@insert_permissions_user');

    //main
    Route::get('/main/view', 'Main\MainController@view_menu_admin');
    Route::post('/main/register', 'Main\MainController@register');
    Route::post('/main/register/get', 'Main\MainController@getMenuMains');
    Route::post('/main/register/get/section', 'Main\MainController@getSection');

    //modulos
    Route::get('/modulo/view', 'Modulos\ModuloController@view_modulo');
    Route::post('/modulo/register', 'Modulos\ModuloController@register');
    Route::post('/modulo/get', 'Modulos\ModuloController@getModulo');
    //test
    Route::get('/user/test/data', 'Auth\loginController@test');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');


