<?php

use App\Http\Controllers\DashboardInitialization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get("/",function(){return !Auth::check() ? view('auth.login') : redirect()->back();})->name('home');

Route::get('/login', function () {return !Auth::check() ? redirect()->route('home') : redirect()->back();})->middleware(['guest'])->name('login');

Route::get('/register', function () {return !Auth::check() ? redirect()->route('home') : redirect()->back();})->middleware(['guest'])->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[DashboardInitialization::class,'initialization'])->name('dashboard');
});
