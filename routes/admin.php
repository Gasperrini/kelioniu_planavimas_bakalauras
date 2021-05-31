<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::group(['prefix'  =>   'users'], function() {

            Route::get('/', 'Admin\UserController@index')->name('admin.users.index');
            Route::get('/create', 'Admin\UserController@create')->name('admin.users.create');
            Route::post('/store', 'Admin\UserController@store')->name('admin.users.store');
            Route::get('/{id}/edit', 'Admin\UserController@edit')->name('admin.users.edit');
            Route::post('/update', 'Admin\UserController@update')->name('admin.users.update');
            Route::get('/{id}/delete', 'Admin\UserController@delete')->name('admin.users.delete');
        
        });

         Route::group(['prefix' => 'landmarks'], function () {

            Route::get('/', 'Admin\LandmarkController@index')->name('admin.landmarks.index');
            Route::get('/create', 'Admin\LandmarkController@create')->name('admin.landmarks.create');
            Route::get('/fetch', 'Admin\LandmarkController@fetch')->name('admin.landmarks.fetch');
            Route::post('/store', 'Admin\LandmarkController@store')->name('admin.landmarks.store');
            Route::get('/edit/{id}', 'Admin\LandmarkController@edit')->name('admin.landmarks.edit');
            Route::post('/update', 'Admin\LandmarkController@update')->name('admin.landmarks.update');
            Route::get('/{id}/delete', 'Admin\LandmarkController@delete')->name('admin.landmarks.delete');
            Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
            Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
            Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
            Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
            Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');

         });

         Route::group(['prefix' => 'accommodations'], function () {

            Route::get('/', 'Admin\AccommodationController@index')->name('admin.accommodations.index');
            Route::get('/create', 'Admin\AccommodationController@create')->name('admin.accommodations.create');
            Route::get('/fetch', 'Admin\AccommodationController@fetch')->name('admin.accommodations.fetch');
            Route::post('/store', 'Admin\AccommodationController@store')->name('admin.accommodations.store');
            Route::get('/edit/{id}', 'Admin\AccommodationController@edit')->name('admin.accommodations.edit');
            Route::post('/update', 'Admin\AccommodationController@update')->name('admin.accommodations.update');
            Route::get('/{id}/delete', 'Admin\AccommodationController@delete')->name('admin.accommodations.delete');

         });

         Route::group(['prefix' => 'transports'], function () {

            Route::get('/', 'Admin\TransportController@index')->name('admin.transports.index');
            Route::get('/create', 'Admin\TransportController@create')->name('admin.transports.create');
            Route::get('/fetch', 'Admin\TransportController@fetch')->name('admin.transports.fetch');
            Route::post('/store', 'Admin\TransportController@store')->name('admin.transports.store');
            Route::get('/edit/{id}', 'Admin\TransportController@edit')->name('admin.transports.edit');
            Route::post('/update', 'Admin\TransportController@update')->name('admin.transports.update');
            Route::get('/{id}/delete', 'Admin\TransportController@delete')->name('admin.transports.delete');

         });

         Route::group(['prefix' => 'routes'], function () {

            Route::get('/', 'Admin\RouteController@index')->name('admin.routes.index');
            Route::get('/create', 'Admin\RouteController@create')->name('admin.routes.create');
            Route::get('/fetch', 'Admin\RouteController@fetch')->name('admin.routes.fetch');
            Route::post('/store', 'Admin\RouteController@store')->name('admin.routes.store');
            Route::get('/edit/{id}', 'Admin\RouteController@edit')->name('admin.routes.edit');
            Route::post('/update', 'Admin\RouteController@update')->name('admin.routes.update');
            Route::get('/{id}/delete', 'Admin\RouteController@delete')->name('admin.routes.delete');

         });
    });
});
