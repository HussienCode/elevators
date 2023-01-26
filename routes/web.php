<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\user\AboutController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\ElevatorController;
use App\Http\Controllers\user\PricesController;
use App\Http\Controllers\user\ProductController;


use Illuminate\Support\Facades\Auth;
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

// Site Routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Auth::routes();

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/', [App\Http\Controllers\user\HomeController::class, 'index'])->name('site');

    Route::resource('/about', AboutController::class);

    Route::resource('/contact', ContactController::class);

    Route::resource('/webProducts', ProductController::class);

    Route::get('/filter/{get}', [ProductController::class, 'filter']);


    Route::get('/elevator/{id}', [ElevatorController::class, 'index'])->name('elevator.index');
    Route::get('/webVideos/{id}', [ElevatorController::class, 'showAllVideos'])->name('webVideos.show');
    Route::get('/webFiles/{id}', [ElevatorController::class, 'showAllFiles'])->name('webFiles.show');
    Route::get('/webPhotos/{id}', [ElevatorController::class, 'showAllPhotos'])->name('webPhotos.show');

    Route::resource('/prices', PricesController::class)->name('store', 'userPrices.store');

    Route::post('/nothing', function () {
        return view('user.pages.nothing');
    })->name('nothing');
});

// Auth pages
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth:web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::resource('/cart', CartController::class);
});

/*************************Admin Dashboard**********************************/
Route::get('/admin/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::post('/admin/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');
