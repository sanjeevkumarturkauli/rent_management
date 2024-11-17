<?php

use App\Livewire\Owner\Index;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['role:owner']], function () {
    Route::get('/dashboard',Index::class)->name('owner.dashboard');
});
