<?php

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

Route::middleware('auth:sanctum')->group(function() {
    // Company
    Route::resource('company', \App\Http\Controllers\CompanyController::class)
        ->except(['create', 'edit']);
    // Customer
    Route::resource('customer', \App\Http\Controllers\CustomerController::class)
        ->except(['create', 'edit']);
    // Address
    Route::resource('address', \App\Http\Controllers\AddressController::class)
        ->except(['create', 'edit']);
});
