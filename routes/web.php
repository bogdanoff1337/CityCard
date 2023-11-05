<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CartController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// City CRUD
Route::get('/cities/create', [AdminController::class, 'createCity'])->name('admin.city.create');
Route::post('/cities', [AdminController::class, 'storeCity'])->name('admin.store.city');
Route::delete('/cities/{id}/delete', [AdminController::class, 'destroyCity'])->name('admin.city.delete');
Route::get('/cities/{id}/update', [AdminController::class, 'updateCityIndex'])->name('admin.city.index');
Route::post('/cities/{id}/update', [AdminController::class, 'updateCity'])->name('admin.city.update');
// Type CRUD
Route::get('/type/create', [AdminController::class, 'createType'])->name('admin.type.create');
Route::post('/type', [AdminController::class, 'storeType'])->name('admin.store.type');
Route::delete('/type/{id}/delete', [AdminController::class, 'destroyType'])->name('admin.type.delete');
Route::get('/type/{id}/update', [AdminController::class, 'updateTypeIndex'])->name('admin.type.index');
Route::post('/type/{id}/update', [AdminController::class, 'updateType'])->name('admin.type.update');
// Transport CRUD
Route::get('/transport/create', [AdminController::class, 'createTransport'])->name('admin.transport.create');
Route::post('/transport', [AdminController::class, 'storeTransport'])->name('admin.store.transport');
Route::delete('/transport/{id}/delete', [AdminController::class, 'destroyTransport'])->name('admin.transport.delete');
Route::get('/transport/{id}/update', [AdminController::class, 'updateTransportIndex'])->name('admin.transport.index');
Route::post('/transport/{id}/update', [AdminController::class, 'updateTransport'])->name('admin.transport.update');



Route::get('/user/payments', [CartController::class, 'showPaymentOperations'])->name('card.payment.index');



Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register');



Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login');



Route::get('/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');


// Route::delete('/card/{id}', [CartController::class, 'destroy'])->name('card.delete');

Route::get('/card/add', [CartController::class, 'CardFormShow'])->name('card.add');

Route::post('/card/add', [CartController::class, 'store'])->name('cards.store');
