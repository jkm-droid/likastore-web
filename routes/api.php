<?php

use App\Http\Controllers\MpesaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//lipa na mpesa routes
Route::post('likastore/stk_push', [MpesaController::class, 'mpesa_stk_push']);
Route::post('likastore/save_transactions', [MpesaController::class, 'save_transaction_details']);
