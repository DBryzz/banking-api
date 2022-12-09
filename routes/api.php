<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use GuzzleHttp\Middleware;
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

/*
//  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::controller(AuthController::class)->group(function () {
//     Route::post('login', 'login')->name('login');
//     Route::post('register', 'register')->middleware(['auth.apikey', 'auth.role:admin,cachier'])->name('register');
// });
*/

// All request require API key

// Unprotected routes all you need is an API KEY
Route::middleware(['auth.apikey'])->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

// Protected Routes: Admin Cachier and Customer Only
Route::middleware(['auth.apikey', 'auth.role:admin,cachier,customer'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh-token');

    Route::post('account/create', [AccountController::class, 'create'])->name('create-account');
    Route::get('account/balance/get', [AccountController::class, 'getMyBalance'])->name('get-my-balance');
    Route::get('account/transfers', [TransactionController::class, 'getMyTransfers'])->name('get-my-transfers');

    Route::post('transaction/initiate', [TransactionController::class, 'makeTransaction'])->name('make-transaction');
});

// Protected Routes: Admin and Cachier only
Route::middleware(['auth.apikey', 'auth.role:admin,cachier'])->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::get('account/{id}/balance/get', [AccountController::class, 'retrieveBalance'])->name('get-account-balance');
    Route::get('account/{id}/transfers', [TransactionController::class, 'getTransfers'])->name('get-transfers');
});

// Protected Routes: Admin only
Route::middleware(['auth.apikey', 'auth.role:admin'])->group(function () {
    Route::patch('account/status-change', [AccountController::class, 'changeAccountStatus'])->name('change-account-status');
});