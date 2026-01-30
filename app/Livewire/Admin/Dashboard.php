<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class Dashboard extends Component
{
    public $totalUsers;
    public $totalProducts;
    public $totalOrders;
    public $totalRevenue;

    public function mount()
    {
        $this->totalUsers    = User::count();
        $this->totalProducts = Product::count();
        $this->totalOrders   = Order::count();
        $this->totalRevenue  = Order::sum('total');
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
