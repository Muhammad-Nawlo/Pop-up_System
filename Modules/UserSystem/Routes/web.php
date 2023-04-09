<?php


use Modules\UserSystem\Http\Controllers\UserController;

\Illuminate\Support\Facades\Route::resource('user',UserController::class);
