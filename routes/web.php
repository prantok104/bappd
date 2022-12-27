<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Member\MemberController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Artisan;
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


// --------------------------System reset page------------------------------
Route::get('admin/reset', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('storage:link');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    return back();
})->name('admin.system.restart');


// --------------------------Frontend all routes------------------------
Route::group(["namespace" => "Frontend", "as" => "front."], function () {
    Route::get('/', [PageController::class, 'homePage'])->name('home.page');
    Route::get('/members', [PageController::class, 'memberPage'])->name('member.page');
});


// --------------------------Backend All routes------------------------
Route::group(["prefix" => "auth", "as" => "admin."], function () {
    Route::get('/login', [LoginController::class, "loginIndexPage"])->name('authentication.login.page'); // Login index page
    Route::post('/login-check', [LoginController::class, "loginAuthCheck"])->name("authentication.login.check"); // Login check

    Route::group(["middleware" => "auth"], function () {
        Route::get('/dashboard', [DashboardController::class, "dashboardIndexPage"])->name('dashboard.page'); // Dashboard page

        // ----------------- Bappd members --------------------
        Route::resource('member', MemberController::class);



        Route::get('/logout', [LoginController::class, "logout"])->name('authentication.logout'); // Logout
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
