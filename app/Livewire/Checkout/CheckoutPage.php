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

    public array $cart = [];
    public float $subtotal = 0;
    public float $total = 0;

    protected array $rules = [
        'full_name'   => 'required|string|max:120',
        'phone'       => 'required|string|max:20',
        'address'     => 'required|string|max:255',
        'city'        => 'required|string|max:80',
        'postal_code' => 'required|string|max:20',
    ];

    public function mount(): void
    {
        $this->cart = CartService::get();
        $this->calculateTotals();
    }

    private function calculateTotals(): void
    {
        $this->subtotal = collect($this->cart)->sum(
            fn ($item) => $item['product']->price * $item['qty']
        );

        $this->total = $this->subtotal;
    }

    public function placeOrder(): void
    {
        $this->validate();

        if (empty($this->cart)) {
            $this->addError('cart', 'Your cart is empty.');
            return;
        }

        DB::transaction(function () {

            $order = Order::create([
                'user_id' => Auth::id(),
                'total'   => 0,
                'status'  => 'paid',
                'estimated_arrival' => now()->addDays(5),
            ]);

            $total = 0;

            foreach ($this->cart as $item) {
                $product = Product::findOrFail($item['product']->id);

                $lineTotal = $product->price * $item['qty'];
                $total += $lineTotal;

                OrderItem::create([
                    'order_id'  => $order->id,
                    'product_id'=> $product->id,
                    'price'     => $product->price,
                    'qty'  => $item['qty'],
                ]);
            }

            $order->update([
                'total' => $total,
            ]);
        });

        CartService::clear();

        $this->redirect('/account/orders', navigate: true);
    }

    public function render()
    {
        return view('livewire.checkout.checkout-page', [
            'cart' => $this->cart,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
        ]);
    }
}
