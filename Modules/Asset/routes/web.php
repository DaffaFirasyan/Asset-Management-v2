<?php

use Illuminate\Support\Facades\Route;
use Modules\Asset\Http\Controllers\AssetController;

Route::middleware('web')->group(function() {
    Route::resource('assets', AssetController::class);
});