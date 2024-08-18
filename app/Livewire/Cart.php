<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    public function getItemsProperty()
    {
        return CartFactory::make()->items()->with('variant', 'product')->get();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
