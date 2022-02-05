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
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])
        ->name('app_login');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
        ->name('dashboard');
Route::controller(App\Http\Controllers\PenulisController::class)->prefix('penulis')->group(function () {
    Route::get('/', 'index')->name('penulis_index');
    Route::match(['get', 'post'], '/create', 'create')->name('penulis_create');
    Route::match(['get', 'post'], '/{id}/edit', 'edit')->name('penulis_edit');
    Route::delete('/{id}/remove', 'remove')->name('penulis_remove');
});
Route::controller(App\Http\Controllers\BukuController::class)->prefix('buku')->group(function () {
    Route::get('/', 'index')->name('buku_index');
});
