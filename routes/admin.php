<?php

use App\Livewire\Admin\Index;
use App\Livewire\Admin\Owner\Form;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Owner\Index as OwnerIndex;
use App\Livewire\Admin\Partner\Index as PartnerIndex;

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', Index::class)->name('admin.dashboard');

    Route::get('/owners', OwnerIndex::class)->name('owner.index');
    Route::get('/partners', PartnerIndex::class)->name('partner.index');

    Route::get('/owners/add',Form::class)->name('owner.add');

    Route::get('get-owners', [OwnerIndex::class, 'getOwners'])->name('get-owners');
    Route::post('/update-status', [OwnerIndex::class, 'updateStatus'])->name('update-status');
    Route::delete('/delete-owner/{id}', [OwnerIndex::class, 'deleteOwner'])->name('delete-owner');
});
