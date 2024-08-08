<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ModelProduct;

class Product extends Component
{
    public ModelProduct $product;

    public function render()
    {
        return view('livewire.product');
    }
}
