<?php

namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use App\Models\Product as ProductModel;

class Product extends Component
{
    use InteractsWithBanner;

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

        $this->banner('Your product has been added to the cart');
    }

    public function render()
    {
        return view('livewire.product');
    }
}
