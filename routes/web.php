<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\SocialShareButtonsController::class, 'ShareWidget']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/refer', [App\Http\Controllers\YouController::class, 'store'])->name('refer');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'edit']);

Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('store');

Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');

Route::get('/allReferrals', [App\Http\Controllers\ReferralController::class, 'index'])->name('allReferrals');

Route::get('/downloadFile', [App\Http\Controllers\ReferralController::class, 'downloadReferalIndex'])->name('downloadFile');

Route::get('/download/{id}', [App\Http\Controllers\ReferralController::class, 'downloadExcelFileOfReferral']);

// Route::get('/fillfeedback/{id}', [App\Http\Controllers\ReferralController::class, 'downloadExcelFileOfReferral']);

Route::post('/fillFeedBack', [App\Http\Controllers\BusinessController::class, 'update'])->name('updateReferralStatus');

// Route::get('/graph', [App\Http\Controllers\BusinessController::'show'])->name('graph');