<?php


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



Route::get('/', ['as' => '/', 'uses' => 'HomeController@index']);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('categories', ['as' => 'categories', 'uses' => 'CategoriesController@index']);

        Route::group(['prefix' => 'categories'], function () {

            Route::get('create', ['as' => 'create-categories', 'uses' => 'CategoriesController@create']);
            Route::post('create', ['as' => 'create-categories', 'uses' => 'CategoriesController@store']);
            Route::get('edit/{id}', ['as' => 'edit-categories', 'uses' => 'CategoriesController@edit'])->where(['id' => '[0-9]+']);
            Route::post('edit/{id}', ['as' => 'update-categories', 'uses' => 'CategoriesController@update'])->where(['id' => '[0-9]+']);
            Route::get('destroy/{id}', ['as' => 'destroy-categories', 'uses' => 'CategoriesController@destroy'])->where(['id' => '[0-9]+']);
        });

        Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);

        Route::group(['prefix' => 'products'], function () {

            Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
            Route::post('create', ['as' => 'products.create', 'uses' => 'ProductsController@store']);
            Route::get('edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit'])->where(['id' => '[0-9]+']);
            Route::post('edit{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update'])->where(['id' => '[0-9]+']);
            Route::get('destroy{id}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy'])->where(['id' => '[0-9]+']);

            Route::group(['prefix' => 'images'], function() {

                Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
                Route::get('create/{id}/product', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
                Route::post('create/{id}/product', ['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
                Route::get('destroy/{id}/image', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);

            });
        });
    });
});


