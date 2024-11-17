<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;


Route::prefix("add")->group(function(){
    Route::post("owner", [OwnerController::class, 'create']);
    Route::post("partner", [OwnerController::class, 'create']);
});
