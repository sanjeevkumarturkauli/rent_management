<?php

use App\Livewire\Partner\Index;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['role:partner']], function () {
    Route::get('/dashboard',Index::class)->name('partner.dashboard');
});
