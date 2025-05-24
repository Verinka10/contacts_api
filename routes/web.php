<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\ContactController;

Route::resource('/contacts', App\Http\Controllers\ContactController::class);
