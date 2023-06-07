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
Route::get('/details/{id}', [homeController::class, "details"])->middleware('auth', 'auth.role:user');
Route::post('/details/store-review/{id}', [homeController::class, "storeReviewCafe"])->middleware('auth', 'auth.role:user');
Route::get('/feeds', [homeController::class, "feeds"])->middleware('auth', 'auth.role:user');
Route::get('/details-feeds/{id}', [homeController::class, "detailsFeeds"])->middleware('auth', 'auth.role:user');
Route::post('/details-feeds/store/{id}', [homeController::class, "storeReviewEvent"])->middleware('auth', 'auth.role:user');
Route::get('/see-all', [homeController::class, "seeAll"]);
Route::get('/profile', [homeController::class, "profile"])->middleware('auth', 'auth.role:user');
Route::get('/profile/edit', [homeController::class, "profileEdit"])->middleware('auth', 'auth.role:user');
Route::put('/profile/update', [homeController::class, "profileUpdate"])->middleware('auth', 'auth.role:user');
Route::get('/search', [homeController::class, "search"])->middleware('auth', 'auth.role:user');
Route::get('/filter', [homeController::class, "filter"])->middleware('auth', 'auth.role:user');

Route::get('/cafe', [cafeHomeController::class, "index"])->middleware('auth', 'auth.role:cafe');
Route::get('/cafe/edit', [cafeHomeController::class, "edit"])->middleware('auth', 'auth.role:cafe');
Route::put('/cafe/edit/update', [cafeHomeController::class, "update"])->middleware('auth', 'auth.role:cafe');
Route::post('/cafe/event/store/{id}', [cafeHomeController::class, "eventStore"])->middleware('auth', 'auth.role:cafe');
Route::get('/cafe/event-delete/{id}', [cafeHomeController::class, "eventDelete"])->middleware('auth', 'auth.role:cafe');
Route::get('/cafe/profile', [cafeHomeController::class, "profile"])->middleware('auth', 'auth.role:cafe');
Route::get('/cafe/profile/edit', [cafeHomeController::class, "profileEdit"])->middleware('auth', 'auth.role:cafe');
Route::put('/cafe/profile/update', [cafeHomeController::class, "profileUpdate"])->middleware('auth', 'auth.role:cafe');
Route::get('/cafe/event-edit/{id}', [cafeHomeController::class, "eventEdit"])->middleware('auth', 'auth.role:cafe');
Route::put('/cafe/event-edit/update/{id}', [cafeHomeController::class, "eventUpdate"])->middleware('auth', 'auth.role:cafe');
