<?php

use Darkjinnee\Footing\Http\Controllers\DeviceController;
use Darkjinnee\Footing\Http\Controllers\PermissionController;
use Darkjinnee\Footing\Http\Controllers\RegisterController;
use Darkjinnee\Footing\Http\Controllers\RoleController;
use Darkjinnee\Footing\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix(config('footing.auth.routes.prefix'))
    ->name(config('footing.auth.routes.name'))
    ->middleware(config('footing.auth.routes.middleware'))
    ->group(/**
     *
     */ function () {
        Route::post('register', RegisterController::class)->name('register');
        Route::post('token', TokenController::class)->name('token');

        Route::get('unauthorized', function (Request $request) {
            return response()->json(['message' => 'Unauthorized.', 'errors' => ['auth' => 'Unauthorized.']], 401);
        })->name('unauthorized');
    });

Route::prefix(config('footing.resources.routes.prefix'))
    ->name(config('footing.resources.routes.name'))
    ->middleware(config('footing.resources.routes.middleware'))
    ->group(/**
     *
     */ function () {
        Route::apiResources([
            'permissions' => PermissionController::class,
            'roles' => RoleController::class,
            'devices' => DeviceController::class,
        ]);
    });
