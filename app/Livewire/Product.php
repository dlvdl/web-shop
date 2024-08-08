<?php

namespace App\Livewire;

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

    public function addToCart()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.product');
    }
}
