<?php

use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/', function () {
    // auth()->user()->attachRole('admin');
    return view('welcome');
});

require __DIR__.'/dashboard.php';

require __DIR__.'/auth.php';
