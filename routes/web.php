<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DrinkSoldController;
use App\Http\Controllers\ProfileController;
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
*/

Route::get('/', function () {
    return view('base.welcome');
})->name('welcome');
//admin
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');

//admin profile
Route::get('profile', [ProfileController::class, 'get_user_details'])->name('profile.index');
Route::put('profile/deactivate/{admin_id}', [ProfileController::class, 'deactivate_profile'])->name('profile.deactivate');
Route::get('profile/edit/{admin_id}', [ProfileController::class, 'edit_profile'])->name('profile.edit');
Route::get('profile/view/{admin_id}', [ProfileController::class, 'view_profile'])->name('profile.view');
Route::put('profile/update/{admin_id}', [ProfileController::class, 'update_profile'])->name('profile.update');
Route::put('profile/delete/{admin_id}', [ProfileController::class, 'delete_profile'])->name('profile.delete');

//users
//Route::get('users/register', [UserController::class, 'show_register'])->name('show.register');
Route::post('register', [UserController::class, 'register'])->name('user.register');
Route::get('users/login', [UserController::class, 'show_login'])->name('show.login');
Route::post('login', [UserController::class, 'login'])->name('user.login');
Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('users/forgot_pass', [UserController::class, 'show_forgot_pass_form'])->name('user.forgot_pass');
Route::post('forgot_pass', [UserController::class, 'submit_forgot_pass_form'])->name('user.forgot_submit');
Route::get('users/reset_pass/{token}', [UserController::class, 'show_reset_pass_form'])->name('user.reset_form');
Route::post('reset_pass', [UserController::class, 'reset_pass'])->name('user.reset_pass');
Route::post('newsletter/subscribe', [UserController::class, 'subscribe_to_newsletter'])->name('newsletter.subscribe');

//drinks
Route::put('drinks/publish/{drink_id}', [DrinkController::class, 'publish_drink'])->name('drinks.publish');
Route::get('drinks/category/{category}', [DrinkController::class, 'category'])->name('drinks.category');
Route::resource('drinks', DrinkController::class);

//orders
Route::put('/orders/pay/{order_id}', [OrderController::class, 'pay'])->name('orders.pay');
Route::put('/orders/confirm/{order_id}', [OrderController::class, 'confirm'])->name('orders.confirm');
Route::put('/orders/deliver/{order_id}', [OrderController::class, 'deliver'])->name('orders.deliver');
Route::get('orders/search', [OrderController::class, 'search_order'])->name('orders.search');
Route::resource('orders', OrderController::class);

//drinks sold
Route::get('sold', [DrinkSoldController::class, 'get_drinks_sold'])->name('sold.index');

//tasks
Route::resource('tasks', TaskController::class);

//app sliders
Route::resource('flippers', FlipperController::class);

//mass images upload
Route::post('images/create', [ImageController::class, 'store'])->name('images.store');
Route::resource('images', ImageController::class);
