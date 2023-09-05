<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
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
// Route::get('/', [App\Http\Controllers\SearchController::class, 'searchMercadoLivre'])->name('searchMercadoLivre');
Route::get('/', 'SearchController@searchMercadoLivre');
Route::post('/search/mercado-livre', 'SearchController@searchMercadoLivre');
Route::post('/search/buscape', 'SearchController@searchBuscape');
Route::post('/save-result', 'SearchController@saveResult');

