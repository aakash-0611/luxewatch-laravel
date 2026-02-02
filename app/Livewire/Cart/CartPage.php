<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Services\CartService;

class CartPage extends Component
{
    public function increment($id)
    {
        $cart = CartService::get();
        CartService::update($id, $cart[$id]['quantity'] + 1);
        $this->dispatch('cartUpdated');

    }

    public function decrement($id)
    {
        $cart = CartService::get();
        CartService::update($id, $cart[$id]['quantity'] - 1);
        $this->dispatch('cartUpdated');
    }

    public function remove($id)
    {
        CartService::remove($id);
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart.cart-page', [
            'cart' => CartService::get(),
            'total' => CartService::total(),
        ]);
    }
}

