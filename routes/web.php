<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return Inertia::render('Auth/Login', [
        'canRefister' => Route::has('register')
    ]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'haveRole:Admin'], function () {
        Route::inertia('/dashboard', 'Dashboard')->name('Dashboard');
        Route::inertia('/users', 'Users/Users')->name('Users/Users');
        Route::inertia('/orders', 'Orders/Orders')->name('Orders/Orders');
    });

    Route::group(['middleware' => 'haveRole:User'], function () {
        Route::inertia('/dashboard', 'Dashboard')->name('Dashboard');
        Route::inertia('/apply', 'Apply/Apply')->name('Apply/Apply');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
