<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Wishlist;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

class ProductShow extends Component
{
    protected static string $layout = 'layouts.app';

    public Product $product;

    public bool $inWishlist = false;

    /**
     * Mount the component with product ID
     */
    public function mount(int $id): void
    {
        $this->product = Product::where('active', true)->findOrFail($id);

        if (Auth::check()) {
            $this->inWishlist = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $this->product->id)
                ->exists();
        }
    }

    /**
     * Add product to cart (session-based)
     */
    public function addToCart(): void
    {
        CartService::add($this->product);

        $this->dispatch('cartUpdated');

        session()->flash('success', 'Product added to cart');
    }

    /**
     * Add product to wishlist
     */
    public function addToWishlist(): void
    {
        if (! Auth::check()) {
            redirect()->route('login')->send();
            return;
        }

        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id,
        ]);

        $this->inWishlist = true;
    }

    /**
     * Remove product from wishlist
     */
    public function removeFromWishlist(): void
    {
        if (! Auth::check()) {
            return;
        }

        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $this->product->id)
            ->delete();

        $this->inWishlist = false;
    }

    /**
     * Render the view
     */
    public function render()
    {
        return view('livewire.products.products-show');
    }
}
