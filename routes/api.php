<?php

Route::group(['middleware' => 'api'], function () {

    //UNAUTHENTICATED
    Route::group(['namespace' => 'Api\Auth'], function () {
        Route::post('/login', ['uses' => 'AuthController@login']);
        Route::post('/register', ['uses' => 'AuthController@register']);
//        Route::post('/login/check', ['uses' => 'AuthController@checkLogin']);
    });


    Route::group(['namespace' => 'Api'], function () {




        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('/user/categories', ['uses' => 'CategoryController@getUserCategories']);
            Route::post('/user/categories/add', ['uses' => 'CategoryController@chooseOrRemoveCategory']);
            Route::get('/categories', ['uses' => 'CategoryController@getCategories']);


            Route::get('/projects', ['uses' => 'ProjectController@getProjectsByCategory']);
            Route::get('/user/projects/creator', ['uses' => 'ProjectController@getCreatorProjects']);
            Route::get('/user/projects/implementer', ['uses' => 'ProjectController@getImplementerProjects']);
            Route::post('/create/project', ['uses' => 'ProjectController@createProject']);
            Route::post('/evaluate/project', ['uses' => 'ProjectController@evaluateProject']);

            Route::post('/send/request', ['uses' => 'RequestController@sendRequest']);
            Route::post('/accept/request', ['uses' => 'RequestController@acceptRequest']);
            Route::get('/request/by/project/{project_id}', ['uses' => 'RequestController@getRequestByProject'])->where('id', '[0-9]+');


            Route::get('/profile', ['uses' => 'ProfileController@myProfile']);
            Route::post('/profile/avatar', ['uses' => 'ProfileController@changeAvatar']);
            Route::post('/profile/update', ['uses' => 'ProfileController@updateProfile']);


            Route::get('/chats', ['uses' => 'ChatController@getAllChats']);

            Route::get('/users/by/category/{category_id}', ['uses' => 'UserController@getUsersByCategory'])->where('id', '[0-9]+');


            Route::get('/cities', ['uses' => 'StaticController@getAllCities']);
        });

    });
});

