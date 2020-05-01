<?php

Route::group(['middleware' => 'api'], function () {

    //UNAUTHENTICATED
    Route::group(['namespace' => 'Api\Auth'], function () {
        Route::post('/login', ['uses' => 'AuthController@login']);
        Route::post('/register', ['uses' => 'AuthController@register']);
//        Route::post('/login/check', ['uses' => 'AuthController@checkLogin']);
    });


    Route::group(['namespace' => 'Api'], function () {

        Route::get('/categories', ['uses' => 'CategoryController@getCategories']);
        Route::get('/projects', ['uses' => 'ProjectController@getProjectsByCategory']);
        Route::get('/users/by/category/{category_id}', ['uses' => 'UserController@getUsersByCategory'])->where('id', '[0-9]+');

        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('/user/categories', ['uses' => 'CategoryController@getUserCategories']);
            Route::post('/user/categories/add', ['uses' => 'CategoryController@chooseOrRemoveCategory']);

            Route::get('/user/projects', ['uses' => 'ProjectController@getUserProjects']);
            Route::post('/create/project', ['uses' => 'ProjectController@createProject']);

            Route::post('/send/request', ['uses' => 'RequestController@sendRequest']);
            Route::post('/accept/request', ['uses' => 'RequestController@acceptRequest']);





        });

    });
});

