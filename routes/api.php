<?php

use App\Http\Controllers\Api\OrderPushController;
use App\Http\Controllers\Api\UserPushController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/insert-order', [OrderPushController::class, 'InsertOrder']);
Route::post('/insert-user', [UserPushController::class, 'InsertUser']);
