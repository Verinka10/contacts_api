<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/contacts', App\Http\Controllers\API\ContactController::class)
    ->names([
        'index' => 'api.contacts.index',
        'update' => 'api.contacts.update',
        'store' => 'api.contacts.store',
        'destroy' => 'api.contacts.destroy',
    ])
    ->middleware(EnsureTokenIsValid::class)
;
