<?php

namespace App\Livewire\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistPage extends Component
{
    public function remove($id)
    {
        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->delete();
    }

    public function render()
    {
        return view('livewire.wishlist.wishlist-page', [
            'items' => Wishlist::with('product')
                ->where('user_id', Auth::id())
                ->get()
        ]);
    }
}

