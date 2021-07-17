<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FlipperController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;

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
    return view('base.welcome');
});

Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('users/login', [UserController::class, 'show_login'])->name('show.login');
Route::post('login', [UserController::class, 'login'])->name('user.login');

Route::get('users/register', [UserController::class, 'show_register'])->name('show.register');
Route::post('register', [UserController::class, 'register'])->name('user.register');

Route::get('logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('drinks/category/{category}', [DrinkController::class, 'category'])->name('drinks.category');
Route::resource('drinks', DrinkController::class);

Route::put('/orders/pay/{order_id}', [OrderController::class, 'pay'])->name('orders.pay');
Route::put('/orders/confirm/{order_id}', [OrderController::class, 'confirm'])->name('orders.confirm');
Route::put('/orders/deliver/{order_id}', [OrderController::class, 'deliver'])->name('orders.deliver');
Route::resource('orders', OrderController::class);

Route::resource('tasks', TaskController::class);

Route::resource('flippers', FlipperController::class);

Route::post('images/create', [ImageController::class, 'store'])->name('images.store');
Route::resource('images', ImageController::class);
