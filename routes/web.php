<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FetchApiController;

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


/* Gets data for index page; Index file: ( views/pages/api.blade.php ) */
Route::get('/', [App\Http\Controllers\FetchApiController::class, 'get_all_characters']);
/* Gets data by page id */
Route::get('/page/{id}', [App\Http\Controllers\FetchApiController::class, 'get_characters']);
/* Gets data by character id */
Route::get('/character/{id}', [App\Http\Controllers\FetchApiController::class, 'get_character']);
/* Gets data by location id */
Route::get('/location/{id}', [App\Http\Controllers\FetchApiController::class, 'get_character_locations'])->name('locations.get_character_locations');





