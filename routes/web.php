<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\SubscriberController;
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

// Route::get('/', function () {
//     // auth()->user()->attachRole('admin');
//     return view('welcome');
// })->name('home');

Route::controller(HomeController::class)->group(function ()
{
    Route::get('/', 'index')->name('home');

    Route::get('resume-services', 'resumeService')->name('resume.services');

    Route::get('about', 'about')->name('about');

    Route::get('privacy', 'privacy')->name('privacy');

    Route::get('terms', 'terms')->name('terms');

    Route::get('contact', 'contact')->name('contact');

    Route::post('contact', 'sendEmail')->name('contact.send');
});

Route::controller(PostController::class)->prefix('jobs')->name('web.jobs.')->group(function ()
{
    Route::get('/', 'index')->name('index');

    Route::get('show/{job}', 'show')->name('show');

    Route::get('load', 'loadJobs')->name('load');

    Route::get('filter', 'filter')->name('filter');

});

Route::post('subscriber/store', [SubscriberController::class, 'store'])->name('web.subscriber');



require __DIR__.'/dashboard.php';

require __DIR__.'/auth.php';
