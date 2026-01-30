<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Products;
use App\Livewire\Admin\Orders;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/products', Products::class)->name('products');
    Route::get('/users', Users::class)->name('users');
    Route::get('/orders', Orders::class)->name('orders');

});
