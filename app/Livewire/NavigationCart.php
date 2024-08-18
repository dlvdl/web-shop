<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use App\Models\CartItem;
use Livewire\Component;

class NavigationCart extends Component
{
    public $listeners = [
        'productAddedToCart' => '$refresh',
        'productRemovedFromCart' => '$refresh'
    ];

    public function getCartItemsCountProperty()
    {
        return CartFactory::make()->items()->sum('quantity');
    }

    public function render()
    {
        return view('livewire.navigation-cart');
    }
}
