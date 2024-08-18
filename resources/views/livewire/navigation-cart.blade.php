<x-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')">
    {{ __('Your Cart') }} ({{ $this->cartItemsCount }})
</x-nav-link>
