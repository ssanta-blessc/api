<?php

declare(strict_types=1);

use App\Shared\Core\Controllers\TestController;
use App\Shared\Core\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [TestController::class, 'index']);

Route::post('/user', [UserController::class, 'store']);

Route::get('/user/vkid/{vkid}', [UserController::class, 'show']);
