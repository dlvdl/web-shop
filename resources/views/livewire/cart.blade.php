<div class="mt-12 p-5 bg-white rounded-lg shadow">
    <table class="w-full">
        <thead>
            <tr>
                <th class="text-left">Product</th>
                <th class="text-left">Quantity</th>
            </tr>
        </thead>
        <tbody>
        @foreach($this->items as $item)
            <tr wire:key="$item->id">
                <td>{{ $item->product->name }} Size: {{ $item->variant->size }} Color: {{ $item->variant->color }}</td>
                <td>{{ $item->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
