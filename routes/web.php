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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
});

Route::get('/pending', function () {
    return view('pending');
})->name('app.pending');

Route::get('/history', function () {
    return view('history');
})->name('app.history');

Auth::routes();

Route::get('home', [App\Http\Controllers\RefundController::class, 'index'])->name('app.refund');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

Route::get('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'index'])->name('admin.login');

Route::post('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
