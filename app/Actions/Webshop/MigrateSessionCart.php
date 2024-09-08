<?php

namespace App\Actions\Webshop;

use App\Models\Cart;

class MigrateSessionCart
{
    public function migrate(Cart $sessionCart, Cart $userCart): void
    {
        $sessionCartItems = $sessionCart->items()->get()->toArray();


        $userCart->items()->createMany($sessionCartItems);

        $sessionCart->items()->delete();
        $sessionCart->delete();
    }
}
