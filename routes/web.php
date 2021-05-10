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

Auth::routes();

Route::get('home', [App\Http\Controllers\RefundController::class, 'index'])->name('app.refund');

//Envio de Reembolso

Route::post('home/storeRefund', [App\Http\Controllers\RefundController::class, 'storeRefund'])->name('app.Success');

//Cadastro de Tipo

Route::get('home/TypeInput', [App\Http\Controllers\Expense_TypeController::class, 'index'])->name('app.TypeInput');

Route::post('home/TypeInput', [App\Http\Controllers\Expense_TypeController::class, 'storeTypeInput'])->name('app.TypeInput');

//Rotas do Gestor - Pendentes

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

route::post('admin/approve/{id}', [App\Http\Controllers\AdminController::class, 'approve'])->name('admin.approve');

route::post('admin/deny/{id}', [App\Http\Controllers\AdminController::class, 'deny'])->name('admin.deny');

route::get('admin/details/{id}', [App\Http\Controllers\AdminController::class, 'details'])->name('admin.details');

//Histórico

Route::get('history', [App\Http\Controllers\HistoryController::class, 'index'])->name('app.history');

route::get('history/details/{id}', [App\Http\Controllers\HistoryController::class, 'details'])->name('admin.details');


//Rotas de Login

Route::get('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'index'])->name('admin.login');

Route::post('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
