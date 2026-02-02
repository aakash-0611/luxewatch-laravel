<?php

namespace App\Livewire\Static;

use Livewire\Component;

class ContactPage extends Component
{
    protected static string $layout = 'layouts.app';

    public function render()
    {
        return view('livewire.static.contact-page');
    }
}
