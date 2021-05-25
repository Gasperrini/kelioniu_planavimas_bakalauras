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
        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');
        
        Route::group(['prefix'  =>   'categories'], function() {

            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');
        
        });

        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');
            Route::post('/get-values', 'Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');

        });

        Route::group(['prefix'  =>   'brands'], function() {

            Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
            Route::post('/update', 'Admin\BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brands.delete');
        
        });

        /*Route::group(['prefix' => 'products'], function () {

            Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
            Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
            Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
            Route::post('images/upload', 'Admin\ProductImageController@upload')->name('admin.products.images.upload');
            Route::get('images/{id}/delete', 'Admin\ProductImageController@delete')->name('admin.products.images.delete');
            // Load attributes on the page load
            Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
            // Load product attributes on the page load
            Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
            // Load option values for a attribute
            Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
            // Add product attribute to the current product
            Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
            // Delete product attribute from the current product
            Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');

         });*/

         Route::group(['prefix' => 'landmarks'], function () {

            Route::get('/', 'Admin\LandmarkController@index')->name('admin.landmarks.index');
            Route::get('/create', 'Admin\LandmarkController@create')->name('admin.landmarks.create');
            Route::get('/fetch', 'Admin\LandmarkController@fetch')->name('admin.landmarks.fetch');
            Route::post('/store', 'Admin\LandmarkController@store')->name('admin.landmarks.store');
            Route::get('/edit/{id}', 'Admin\LandmarkController@edit')->name('admin.landmarks.edit');
            Route::post('/update', 'Admin\LandmarkController@update')->name('admin.landmarks.update');
            Route::get('/{id}/delete', 'Admin\LandmarkController@delete')->name('admin.landmarks.delete');
           /* Route::post('images/upload', 'Admin\LandmarkImageController@upload')->name('admin.products.images.upload');
            Route::get('images/{id}/delete', 'Admin\LandmarkImageController@delete')->name('admin.products.images.delete');*/
            // Load attributes on the page load
            Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
            // Load product attributes on the page load
            Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
            // Load option values for a attribute
            Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
            // Add product attribute to the current product
            Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
            // Delete product attribute from the current product
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

         Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
            Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
         });
    });
});
