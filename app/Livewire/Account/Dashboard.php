<?php

namespace App\Livewire\Account;

use Livewire\Component;

class Dashboard extends Component
{
    protected static string $layout = 'layouts.app';

    public function render()
    {
        return view('livewire.account.dashboard');
    }
}
