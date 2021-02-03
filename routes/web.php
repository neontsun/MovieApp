<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

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

/* Index-movie */
Route::get('/', 'MoviesController@index')
    ->name('movies.index');

/** Movies */
Route::get('/movies/{id}', 'MoviesController@show')
    ->name('movies.show');

/** Actors */
Route::get('/actors', 'ActorsController@index')
    ->name('actors.index');
Route::get('/actors/{id}', 'ActorsController@show')
   ->name('actors.show');
Route::get('/actors/page/{page?}', 'ActorsController@index');

/** TV Shows */
Route::get('/tv', 'TvController@index')
   ->name('tv.index');
Route::get('/tv/{id}', 'TvController@show')
   ->name('tv.show');

//Route::fallback(function(){
//   return \Response::view('errors.error');
//});
