<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('/pay/verify', [PaymentController::class, 'verify'])->name('verify');
