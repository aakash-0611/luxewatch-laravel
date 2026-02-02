<div class="bg-bg min-h-screen">
    <section class="max-w-6xl mx-auto px-4 py-28">

        <h1 class="text-text text-3xl font-semibold mb-8">
            Your Cart
        </h1>

        @if(empty($cart))
            <p class="text-text-muted">Your cart is empty.</p>
        @else
            <div class="space-y-6">
                @foreach($cart as $item)
                    <div class="flex justify-between items-center border-b border-border pb-4">
                        <div>
                            <p class="text-text font-medium">
                                {{ $item['brand'] }} {{ $item['model'] }}
                            </p>
                            <p class="text-text-muted text-sm">
                                ${{ number_format($item['price'], 2) }}
                            </p>
                        </div>

                        <div class="flex items-center gap-4">
                            <button wire:click="decrement({{ $item['id'] }})">−</button>
                            <span>{{ $item['quantity'] }}</span>
                            <button wire:click="increment({{ $item['id'] }})">+</button>
                        </div>

                        <button wire:click="remove({{ $item['id'] }})"
                                class="text-red-400 text-sm">
                            Remove
                        </button>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 flex justify-between items-center">
                <p class="text-text text-xl">
                    Total: <span class="text-gold">${{ number_format($total, 2) }}</span>
                </p>

                <a href="/checkout"
                   class="px-8 py-3 bg-gold text-black rounded-full">
                    Checkout
                </a>
            </div>
        @endif

    </section>
</div>
