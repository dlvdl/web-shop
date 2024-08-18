<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use App\Models\CartItem;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    public function getItemsProperty()
    {
        return CartFactory::make()->items()->with('variant', 'product')->get();
    }

    public function increment($itemId)
    {
        CartFactory::make()->items()->find($itemId)->increment('quantity');

        $this->dispatch('productAddedToCart');
    }

    public function decrement($itemId)
    {
        $item = CartFactory::make()->items()->find($itemId);

        if ($item->quantity > 1) {
            $item->decrement('quantity');
        }

        if ($item->quantity === 1) {
            $item->delete();
        }

        $this->dispatch('productRemovedFromCart');
    }

    public function delete($itemId)
    {
        CartFactory::make()->items()->where('id', $itemId)->delete();

        $this->dispatch('productRemovedFromCart');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
