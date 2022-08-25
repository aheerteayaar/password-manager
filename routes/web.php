<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\PasswordController;


Route::get('/', function () {
    return view('welcome');
});
 
Route::get('add-password', [PasswordController::class, 'index']);
Route::post('store-form', [PasswordController::class, 'store']);