<div class="grid grid-cols-2 gap-10 py-12">
    <div class="space-y-4" x-data="{ image: '/{{ $this->product->image->path }}'}">
        <div class="bg-white p-5 rounded-lg shadow">
            <img x-bind:src="image" alt="product_image">
        </div>
        <div class="grid grid-cols-4 gap-4">
            @foreach($this->product->images as $image)
                <div class="cursor-pointer" @click="image='/{{$image->path}}'">
                    <img src="/{{$image->path}}" class="rounded bg-white p-2 shadow h-full" alt="image_path">
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <h1 class="text-3xl font-medium">{{ $this->product->name }}</h1>
        <div>
            <span class="text-xl text-gray-700">{{ $this->product->price }}</span>
        </div>

        <div class="mt-4">
            <p class="">{{ $this->product->description }}</p>
        </div>

        <div class="mt-4 space-y-4">
            <select wire:model="variant" class="block w-full rounded-md border-0 py-1.15 text-gray-700">
                @foreach( $this->product->variants as $variant)
                    <option value="{{ $variant->id }}">{{ $variant->size }} / {{ $variant->color }}</option>
                @endforeach
            </select>

            @error('variant')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror

            <x-button wire:click="addToCart">Add to cart</x-button>
        </div>
    </div>
</div>
