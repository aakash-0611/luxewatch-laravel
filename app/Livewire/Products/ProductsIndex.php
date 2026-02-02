<?php

namespace App\Livewire\Products;

use Livewire\Component;

class ProductsIndex extends Component
{
    protected static string $layout = 'layouts.app';

    public function render()
    {
        return view('livewire.products.products-index');
    }
}
