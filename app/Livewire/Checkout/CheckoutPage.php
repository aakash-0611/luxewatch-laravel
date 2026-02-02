<?php

namespace App\Livewire\Checkout;

use Livewire\Component;
use App\Services\CartService;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutPage extends Component
{
    protected static string $layout = 'layouts.app';

    public string $full_name = '';
    public string $phone = '';
    public string $address = '';
    public string $city = '';
    public string $postal_code = '';

    protected $rules = [
        'full_name' => 'required|string|max:120',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:80',
        'postal_code' => 'required|string|max:20',
    ];

    public function placeOrder()
    {
        $this->validate();

        $cart = CartService::get();

        if (empty($cart)) {
            $this->addError('cart', 'Your cart is empty.');
            return;
        }

        DB::transaction(function () use ($cart) {

            $total = 0;

            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => 0, // temp
                'status' => 'paid',
                'estimated_arrival' => now()->addDays(5),
            ]);

            foreach ($cart as $item) {

                $product = Product::findOrFail($item['id']);

                $lineTotal = $product->price * $item['quantity'];
                $total += $lineTotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                ]);
            }

            // Update final total
            $order->update([
                'total' => $total,
            ]);
        });

        CartService::clear();

        return redirect('/account/orders');
    }

    public function render()
    {
        return view('livewire.checkout.checkout-page', [
            'cart' => CartService::get(),
            'total' => CartService::total(),
        ]);
    }
}
