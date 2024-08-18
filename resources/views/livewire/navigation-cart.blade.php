<x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
    {{ __('Your Cart') }} ({{ $this->cartItemsCount }})
</x-nav-link>
