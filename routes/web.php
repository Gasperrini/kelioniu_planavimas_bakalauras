<?php

require 'admin.php';

use Illuminate\Support\Facades\Route;
Auth::routes();

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'site.pages.homepage');
//Route::get('/', 'Site\CategoryController@showHome')->name('category.showHome');
Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');
Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');
Route::get('/planner', 'Site\PlannerController@show')->name('planner.index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/my_journeys', 'Site\JourneyController@index')->name('journey.index');
    Route::get('/my_journeys/{slug}', 'Site\JourneyController@show')->name('journey.show');
    Route::get('/my_journeys/{slug}/pdf', 'Site\JourneyController@createPDF')->name('journey.pdf');
    Route::get('/my_journeys/download', 'Site\JourneyController@downloadFile')->name('journey.download');
    //Route::get('/planner', 'Site\PlannerController@show')->name('planner.index');
    Route::get('/planner/generated', 'Site\PlannerController@showUpdated')->name('planner.generated');
    Route::post('/planner/confirm', 'Site\PlannerController@confirmed')->name('planner.confirmed');
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');
    Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');
    Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');
});