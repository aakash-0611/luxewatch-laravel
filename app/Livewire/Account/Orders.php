<?php

namespace App\Livewire\Account;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Orders extends Component
{
    protected static string $layout = 'layouts.app';

    public function render()
    {
        return view('livewire.account.orders', [
            'orders' => Order::where('user_id', Auth::id())->latest()->get()
        ]);
    }
}
