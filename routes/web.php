<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['web', \App\Http\Middleware\SecurityMiddleware::class])->group(function () {
    Route::get('/', [FormController::class, 'showForm'])->name('form');
    Route::post('/submit', [FormController::class, 'submitForm'])->name('form.submit');
    Route::get('/get-phone-code', [FormController::class, 'getPhoneCode'])->name('form.get-phone-code');
    Route::get('/download', [FileController::class, 'downloadBrochure'])->name('file.download-brochure');
});
