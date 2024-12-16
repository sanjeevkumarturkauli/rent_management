<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\Partner\PartnerController;

Route::prefix("add")->group(function(){
    Route::post("owner", [OwnerController::class, 'create']);
    Route::post("partner", [PartnerController::class, 'create']);
});


Route::prefix("auth")->group(function(){
    Route::post("login", [AuthController::class, 'store']);
});
