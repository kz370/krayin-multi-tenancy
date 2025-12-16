<?php

use Illuminate\Support\Facades\Route;
use Webkul\MultiTenancy\Http\Controllers\Admin\MultiTenantController;

// Landlord Admin Routes
if (config('multi_tenancy.show_menu', false)) {
    Route::group(['middleware' => ['web', 'admin_locale', 'user'], 'prefix' => 'admin/tenants', 'as' => 'admin.tenants.'], function () {
        Route::get('/', [MultiTenantController::class, 'index'])->name('index');
        Route::get('/create', [MultiTenantController::class, 'create'])->name('create');
        Route::post('/store', [MultiTenantController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [MultiTenantController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [MultiTenantController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [MultiTenantController::class, 'destroy'])->name('delete');
        Route::post('/force-delete/{id}', [MultiTenantController::class, 'forceDestroy'])->name('force_delete');
    });
};
