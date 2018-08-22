<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'jwt.auth'], function()
{
  Route::get('auth/user', 'AuthController@user');
  Route::post('auth/logout', 'AuthController@logout');

  Route::get('companies', 'CompaniesController@index');
  Route::get('users', 'UsersController@index');

  Route::get('benhnhan', 'BenhNhanController@index');
  Route::post('add-benhnhan', 'BenhNhanController@store');

  Route::get('articles', 'ArticlesController@index');
});

Route::group(['middleware' => 'jwt.refresh'], function(){
  Route::get('auth/refresh', 'AuthController@refresh');
});
