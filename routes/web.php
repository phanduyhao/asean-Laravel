<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\mainController;
use App\Http\Controllers\Admin\SlidesController;
use App\Http\Controllers\Admin\missionsController;
use App\Http\Controllers\Admin\ListMissionsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\listServicesController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/admin',[mainController::class,'home'])->name('admin');
Route::prefix('admin')->group(function () {
    Route::resource('slides', SlidesController::class);
    Route::resource('missions', missionsController::class);
    Route::resource('listMissions', ListMissionsController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('listServices', listServicesController::class);

});
