<x-nav-link href="{{ route('cart') }}" :active="request()->routeIs('home')">
    {{ __('Your Cart') }} ({{ $this->cartItemsCount }})
</x-nav-link>
