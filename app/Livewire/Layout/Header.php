<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use App\Services\CartService;

class Header extends Component
{
    public bool $mobileMenuOpen = false;

    protected $listeners = [
        'cartUpdated' => '$refresh',
    ];

    public function toggleMobileMenu()
    {
        $this->mobileMenuOpen = ! $this->mobileMenuOpen;
    }

    public function getCartCountProperty(): int
    {
        return CartService::count();
    }

    public function render()
    {
        return view('livewire.layout.header');
    }
}
