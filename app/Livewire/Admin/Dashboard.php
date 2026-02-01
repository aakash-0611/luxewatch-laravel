<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'productsCount' => Product::count(),
            'usersCount'    => User::count(),
            //'ordersCount'   => Order::count(),
            'revenue'       => Order::sum('total'),
        ]);
    }
}
