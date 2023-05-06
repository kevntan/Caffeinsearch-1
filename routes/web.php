<?php

use App\Http\Controllers\cafeHomeController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/sign-in', [loginController::class, "index"]);
Route::post('/sign-in/post', [loginController::class, "login"]);
Route::post('/logout', [loginController::class, "logout"]);

Route::get('/sign-up', [loginController::class, "signup"]);
Route::post('/sign-up/store', [loginController::class, "store"]);

Route::get('/', [homeController::class, "index"]);
Route::get('/details', [homeController::class, "details"]);
Route::get('/feeds', [homeController::class, "feeds"]);
Route::get('/details-feeds', [homeController::class, "detailsFeeds"]);
Route::get('/see-all', [homeController::class, "seeAll"]);

Route::get('/cafe', [cafeHomeController::class, "index"]);
Route::get('/cafe/edit', [cafeHomeController::class, "edit"]);