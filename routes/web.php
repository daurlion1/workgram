<?php

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

//Route::get('/', 'HomeController@welcome')->name('welcome');

//Route::get('/secure/config/migrate-refresh', ['uses' => 'ConfigController@migrateRefresh']);
//Route::get('/secure/config/migrate', ['uses' => 'ConfigController@migrate']);
//Route::get('/secure/config/db-seed', ['uses' => 'ConfigController@dbSeed']);
//Route::get('/secure/config/clear-autoload', ['uses' => 'ConfigController@clearAutoLoad']);
//Route::get('/secure/config/config-cache', ['uses' => 'ConfigController@configCache']);
//Route::get('/secure/config/key-generate', ['uses' => 'ConfigController@keyGenerate']);
//Route::get('/secure/config/optimize', ['uses' => 'ConfigController@optimize']);
//Route::get('/config/locale/{locale}', ['as' => 'locale', 'uses' => 'LocalizationController@index']);

Auth::routes();

Route::group(['namespace' => 'Auth'], function () {


    Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['namespace' => 'Web\Admin'], function () {




        Route::get('categories', ['uses' => 'CategoryController@index', 'as' => 'category.index']);
        Route::get('category/create', ['uses' => 'CategoryController@create', 'as' => 'category.create']);
        Route::post('category/store', ['uses' => 'CategoryController@store', 'as' => 'category.store']);
        Route::get('category/edit/{id}', ['uses' => 'CategoryController@edit', 'as' => 'category.edit'])->where('id', '[0-9]+');
        Route::post('category/update/{id}', ['uses' => 'CategoryController@update', 'as' => 'category.update'])->where('id', '[0-9]+');

        Route::get('cities', ['uses' => 'CityController@index', 'as' => 'city.index']);
        Route::get('city/create', ['uses' => 'CityController@create', 'as' => 'city.create']);
        Route::post('city/store', ['uses' => 'CityController@store', 'as' => 'city.store']);
        Route::get('city/edit/{id}', ['uses' => 'CityController@edit', 'as' => 'city.edit'])->where('id', '[0-9]+');
        Route::post('city/update/{id}', ['uses' => 'CityController@update', 'as' => 'city.update'])->where('id', '[0-9]+');

        Route::get('/users', ['uses' => 'UserController@index', 'as' => 'user.index']);
        Route::get('/projects', ['uses' => 'ProjectController@index', 'as' => 'project.index']);






    });



});
