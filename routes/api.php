<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');
 
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout'); 
    Route::get('user', 'ApiController@getAuthUser');

    //get movies
    Route::get('movies', 'MovieController@getMovies');
   // Route::get('movies/{id}', 'MovieController@getMovieDetails');

    //favorite movies
    Route::post('movies/favorite', 'FavoriteMovieController@addToFavorite');
    Route::get('movies/favorite', 'FavoriteMovieController@getFavorite');

});
