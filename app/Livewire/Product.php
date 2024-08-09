<?php

namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use Livewire\Component;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public ProductModel $product;
    public $variant;

    public $rules = [
        'variant' => ['required', 'exists:App\Models\ProductVariant,id'],
    ];

    public function mount()
    {
        $this->variant = $this->product->variants()->first()->id;
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            $this->variant
        );
    }

    public function render()
    {
        return view('livewire.product');
    }
}
