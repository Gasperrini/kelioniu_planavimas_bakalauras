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

Route::view('/', 'site.pages.homepage');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/my_journeys', 'Site\JourneyController@index')->name('journey.index');
    Route::get('/my_journeys/{id}/delete', 'Site\JourneyController@delete')->name('journey.delete');
    Route::get('/my_journeys/{slug}', 'Site\JourneyController@show')->name('journey.show');
    Route::get('/my_journeys/{slug}/pdf', 'Site\JourneyController@createPDF')->name('journey.pdf');
    Route::get('/my_journeys/download', 'Site\JourneyController@downloadFile')->name('journey.download');
    Route::get('/planner', 'Site\PlannerController@show')->name('planner.index');
    Route::get('/planner/generated', 'Site\PlannerController@showUpdated')->name('planner.generated');
    Route::post('/planner/confirm', 'Site\PlannerController@confirmed')->name('planner.confirmed');
});