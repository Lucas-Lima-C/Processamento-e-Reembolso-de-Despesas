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
    return view('login');
});

Route::get('/refund', function () {
    return view('refund');
})->name('app.refund');

Route::get('/pending', function () {
    return view('pending');
})->name('app.pending');

Route::get('/history', function () {
    return view('history');
})->name('app.history');
