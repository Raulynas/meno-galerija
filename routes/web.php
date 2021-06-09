<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});
    
Auth::routes();


Route::get('/categories/index', 'App\Http\Controllers\CategoryController@index')->name('categories.index')->middleware("auth");
Route::get('/categories/create', 'App\Http\Controllers\CategoryController@create')->name('categories.create')->middleware("auth");
Route::post('/categories/create', 'App\Http\Controllers\CategoryController@store')->middleware("auth");
Route::get('/categories/edit/{category}', 'App\Http\Controllers\CategoryController@edit')->name('categories.edit')->middleware("auth");
Route::post('/categories/edit/{category}', 'App\Http\Controllers\CategoryController@update')->middleware("auth");
Route::delete('/categories/destroy/{category}', 'App\Http\Controllers\CategoryController@destroy')->name('categories.destroy')->middleware("auth");

Route::get('/art/index', 'App\Http\Controllers\ArtController@index')->name('art.index')->middleware("auth");
Route::get('/art/user', 'App\Http\Controllers\ArtController@userIndex')->name('art.user')->middleware("auth");
// Route::get('/art/index/{sort}', 'App\Http\Controllers\ArtController@index')->name('art.index')->middleware("auth");
Route::get('/art/create', 'App\Http\Controllers\ArtController@create')->name('art.create')->middleware("auth");
Route::post('/art/create', 'App\Http\Controllers\ArtController@store')->middleware("auth");
Route::get('/art/edit/{artItem}', 'App\Http\Controllers\ArtController@edit')->name('art.edit')->middleware("auth");
Route::post('/art/edit/{artItem}', 'App\Http\Controllers\ArtController@update')->middleware("auth");
Route::delete('/art/destroy/{artItem}', 'App\Http\Controllers\ArtController@destroy')->name('art.destroy')->middleware("auth");










Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
