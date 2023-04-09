<?php

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

use Illuminate\Support\Facades\Route;
use Modules\PopupSystem\Http\Controllers\CompaignPopupController;
use Modules\PopupSystem\Http\Controllers\PopupController;

Route::middleware('auth')->group(function () {

    Route::resource('popup', PopupController::class);

    Route::get('popup/{popup}/compaign', [CompaignPopupController::class, 'create'])->name('popup.compaign.create');
    Route::post('popup/{popup}/compaign', [CompaignPopupController::class, 'store'])->name('popup.compaign.store');
    Route::delete('popup/{popup}/compaign/{compaign}', [CompaignPopupController::class, 'destroy'])->name('popup.compaign.destroy');
});
