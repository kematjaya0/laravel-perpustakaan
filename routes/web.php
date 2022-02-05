<?php

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
    return redirect()->route('app_login');
});

Route::match(['get', 'post'], '/login', [App\Http\Controllers\AuthController::class, 'login'])
        ->name('app_login')
        ->middleware(['guest']);

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])
        ->name('app_logout')
        ->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->group(function() {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
            ->name('dashboard')
            ->middleware('auth');

    Route::controller(App\Http\Controllers\UserController::class)->prefix('user')->group(function () {
        Route::get('/', 'index')->name('user_index');
        Route::match(['get', 'post'], '/create', 'create')->name('user_create');
        Route::match(['get', 'post'], '/{id}/edit', 'edit')->name('user_edit');
        Route::delete('/{id}/remove', 'remove')->name('user_remove');
    });

    Route::controller(App\Http\Controllers\PenulisController::class)->prefix('penulis')->group(function () {
        Route::get('/', 'index')->name('penulis_index');
        Route::match(['get', 'post'], '/create', 'create')->name('penulis_create');
        Route::match(['get', 'post'], '/{id}/edit', 'edit')->name('penulis_edit');
        Route::delete('/{id}/remove', 'remove')->name('penulis_remove');
    });
    Route::controller(App\Http\Controllers\BukuController::class)->prefix('buku')->group(function () {
        Route::get('/', 'index')->name('buku_index');
        Route::match(['get', 'post'], '/create', 'create')->name('buku_create');
        Route::match(['get', 'post'], '/{id}/edit', 'edit')->name('buku_edit');
        Route::delete('/{id}/remove', 'remove')->name('buku_remove');
    });
});

    
