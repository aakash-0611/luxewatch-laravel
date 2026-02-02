<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class ProductsIndex extends Component
{
    protected static string $layout = 'layouts.app';

    // Filters
    public ?string $brand = null;
    public ?string $condition = null;
    public string $sort = 'latest';

    public function render()
    {
        $query = Product::where('active', true);

        if ($this->brand) {
            $query->where('brand', $this->brand);
        }

        if ($this->condition) {
            $query->where('cond', $this->condition);
        }

        if ($this->sort === 'price_low') {
            $query->orderBy('price', 'asc');
        } elseif ($this->sort === 'price_high') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return view('livewire.products.products-index', [
            'products' => $query->get(),
            'brands' => Product::select('brand')->distinct()->pluck('brand'),
        ]);
    }

    public function resetFilters()
    {
        $this->brand = null;
        $this->condition = null;
        $this->sort = 'latest';
    }
}
