<?php

use Illuminate\Support\Facades\Route;
use Modules\ChatBot\Http\Controllers\ChatBotController;

Route::prefix('v1')->group(function () {
    
    Route::post('/chat', [ChatBotController::class, 'send']);
    
});