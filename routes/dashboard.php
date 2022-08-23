<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Models\Role;
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


// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'role:admin|writer'])->name('dashboard');

Route::middleware('auth')->group(function ()
{

    Route::middleware('role:admin')->group(function ()
    {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'admin'], function ()
        {
            Route::resource('categories', CategoryController::class);

            Route::resource('cities', CityController::class);

            Route::resource('subscribers', SubscriberController::class);

            Route::resource('countries', CountryController::class);

            Route::resource('jobs', PostController::class);

            Route::resource('job-types', JobTypeController::class);


        });

    });

});
