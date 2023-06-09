<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::get('/download', [FileController::class, 'download'])->name('file.download');

Route::get('/', [FormController::class, 'showForm'])->name('form');
Route::post('/submit', [FormController::class, 'submitForm'])->name('submit-form');
Route::get('/get-phone-code', [FormController::class, 'getPhoneCode'])->name('get-phone-code');
Route::get('/download-brochure', [FileController::class, 'downloadBrochure'])->name('download-brochure');
