<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Services\CartService;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProductShow extends Component
{
    protected static string $layout = 'layouts.app';

    public Product $product;
    public bool $inWishlist = false;

    public function addToCart()
    {
        CartService::add($this->product);
        $this->dispatch('cartUpdated');
    }


    public function mount($id)
    {
        $this->product = Product::findOrFail($id);

        if (Auth::check()) {
            $this->inWishlist = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $this->product->id)
                ->exists();
        }
    }

    public function toggleWishlist()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id,
        ]);

        $this->inWishlist = true;
    }

    public function removeFromWishlist()
    {
        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $this->product->id)
            ->delete();

        $this->inWishlist = false;
    }
    
    public function render()
    {
        return view('livewire.products.product-show');
    }
}
