<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use App\Models\CartItem;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    public function getCartProperty()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    public function getItemsProperty()
    {
        return $this->cart->items()->with('variant', 'product')->get();
    }

    public function increment($itemId)
    {
        $this->cart->items->find($itemId)->increment('quantity');

        $this->dispatch('productAddedToCart');
    }

    public function decrement($itemId)
    {
        $item = $this->cart->items->find($itemId);

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
        $this->cart->where('id', $itemId)->delete();

        $this->dispatch('productRemovedFromCart');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
