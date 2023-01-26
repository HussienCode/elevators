<?php

use App\Http\Controllers\admin\AdminAboutController;
use App\Http\Controllers\admin\AdminCartController;
use App\Http\Controllers\admin\AdminPriceController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\DesignController;
use App\Http\Controllers\admin\FileController;
use App\Http\Controllers\admin\ModelController;
use App\Http\Controllers\admin\PhotoController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\TypeController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\AdminServicesController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\doorTypesController;
use App\Http\Controllers\admin\elevatorTypesController;
use App\Http\Controllers\admin\PhonesController;
use App\Http\Controllers\admin\SettingController;
use Illuminate\Support\Facades\Route;


// admin routes
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('/contact', ContactController::class);

Route::resource('/setting', SettingController::class);
Route::resource('/phones', PhonesController::class);

Route::resource('/categories', CategoryController::class);
Route::resource('/designs', DesignController::class);

// Countries & States & Cities
Route::post('/getStates', [CityController::class, 'getStates']);
Route::resource('/countries', CountryController::class);
Route::resource('/states', StateController::class);
Route::resource('/cities', CityController::class);

Route::resource('/types', TypeController::class);
Route::resource('/sizes', SizeController::class);
Route::resource('/models', ModelController::class);
Route::resource('/companies', CompanyController::class);

Route::resource('/products', AdminProductController::class);

Route::get('/photos/create/{id}', [PhotoController::class, 'create'])->name('createProductPhoto');
Route::resource('/photos', PhotoController::class)->only('index', 'store', 'show', 'edit', 'update', 'destroy');

Route::get('/videos/create/{id}', [VideoController::class, 'create'])->name('createProductVideo');
Route::resource('/videos', VideoController::class)->only('index', 'store', 'show', 'edit', 'update', 'destroy');

Route::get('/files/create/{id}', [FileController::class, 'create'])->name('createProductFile');
Route::resource('/files', FileController::class)->only('index', 'store', 'show', 'edit', 'update', 'destroy');
Route::get('/file/{id}', [FileController::class, 'download'])->name('downlaod');

Route::resource('/services', AdminServicesController::class);
Route::resource('/about', AdminAboutController::class);

Route::resource('/prices', AdminPriceController::class);

Route::resource('/doorTypes', doorTypesController::class);
Route::resource('/elevatorTypes', elevatorTypesController::class);

Route::resource('/orders', AdminCartController::class);
