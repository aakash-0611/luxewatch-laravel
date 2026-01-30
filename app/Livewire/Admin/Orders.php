<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class Orders extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::with('user')->latest()->get();
    }

    public function updateStatus($id, $status)
    {
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->save();

        $this->orders = Order::with('user')->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.orders');
    }
}
