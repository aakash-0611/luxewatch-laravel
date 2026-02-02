<?php

use Illuminate\Support\Facades\Route;

// Admin Livewire
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Products;
use App\Livewire\Admin\Orders;

// User / Public
use App\Livewire\Home\HomePage;
use App\Livewire\Products\ProductsIndex;
use App\Livewire\Products\ProductShow;
use App\Livewire\Cart\CartPage;
use App\Livewire\Wishlist\WishlistPage;
use App\Livewire\Account\Dashboard as AccountDashboard;
use App\Livewire\Account\Orders as AccountOrders;
use App\Livewire\Checkout\CheckoutPage;
use App\Livewire\Static\AboutPage;
use App\Livewire\Static\ContactPage;

/* Public Routes */

Route::get('/', HomePage::class);
Route::get('/products', ProductsIndex::class);
Route::get('/products/{id}', ProductShow::class);
Route::get('/cart', CartPage::class);
Route::get('/wishlist', WishlistPage::class);
Route::get('/about', AboutPage::class);
Route::get('/contact', ContactPage::class);


/* Authenticated User Routes */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/account', AccountDashboard::class);
    Route::get('/account/orders', AccountOrders::class);
    Route::get('/checkout', CheckoutPage::class);
});

/* Admin Routes */

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', AdminDashboard::class)->name('dashboard');
        Route::get('/products', Products::class)->name('products');
        Route::get('/users', Users::class)->name('users');
        Route::get('/orders', Orders::class)->name('orders');

    });
