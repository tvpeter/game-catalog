<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('v1/')->group(function () {

    Route::post('player/register', 'Auth\RegisterController@register');
    Route::get('players', 'UserController@index');
    Route::get('users-games', 'UserController@playersgames');
    Route::post('game/create', 'GamesController@createGame')->middleware('auth:api');
    Route::get('day-games/{day}', 'GamesController@gamesPerDay');
    Route::get('games-between/{start}/{end}', 'GamesController@gamesWithinDates');
    Route::get('months-top-games', 'GamesController@topMonthGames');
});
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
