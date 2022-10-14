<?php

use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SupportController;
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
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'admin'], function ()
        {
            Route::resource('users', UserController::class);

            Route::resource('cities', CityController::class);

            Route::resource('subscribers', SubscriberController::class);

            Route::resource('countries', CountryController::class);

            // Route::post('jobs/thumbnail/upload', [PostController::class, 'thumbnail'])
            // ->name('jobs.thumbnail');

            // Route::put('jobs/keywords/{job}', [PostController::class, 'addKeywords'])
            // ->name('posts.keyword');

            // Route::put('jobs/change-status', [PostController::class, 'changeStatus'])
            // ->name('posts.change.status');

            // Route::resource('jobs', PostController::class);

            // Route::resource('job-types', JobTypeController::class);

            Route::resource('ads', AdController::class);

            Route::name('settings.')
            ->prefix('settings')
            ->controller(SettingController::class)
            ->group(function ()
            {
                Route::get('/', 'index')->name('index');
                Route::post('website/colors', 'websiteColors')->name('website.colors');
                Route::post('website/logo/upload', 'logo')->name('website.logo');
                Route::post('website/logo/icon/upload', 'icon')->name('website.logo.icon');
                Route::post('website/seo', 'seo')->name('website.seo');
                Route::post('website/social-media', 'socialMedia')->name('website.social-media');
                Route::post('website/social-media/buttons-color', 'socialMediaButtonColor')->name('website.social-media.buttons.color');
                Route::post('website/job/buttons-color', 'jobButtonColor')->name('website.job.buttons.color');
                Route::post('website/job/register/links', 'registerThroughAwamir')->name('website.job.awamir.links');
                Route::post('website/contact', 'contact')->name('website.contact');
                Route::post('website/pages', 'pages')->name('website.pages');
            });

        });

    });



    Route::middleware('role:admin|writer')->group(function ()
    {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'admin'], function ()
        {

            Route::resource('categories', CategoryController::class);

            Route::post('jobs/thumbnail/upload', [PostController::class, 'thumbnail'])
            ->name('jobs.thumbnail');

            Route::put('jobs/keywords/{job}', [PostController::class, 'addKeywords'])
            ->name('posts.keyword');

            Route::put('jobs/change-status', [PostController::class, 'changeStatus'])
            ->name('posts.change.status');

            Route::resource('jobs', PostController::class);

            Route::resource('job-types', JobTypeController::class);

            Route::resource('supports', SupportController::class);

        });

    });


});
