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
                <div class="flex gap-4 border-b border-border py-4">

                    {{-- Image --}}
                    <img
                        src="{{ asset('storage/' . $item['product']->image_url) }}"
                        class="w-20 h-20 object-cover rounded"
                    >

                    {{-- Details --}}
                    <div class="flex-1">
                        <p class="font-medium">
                            {{ $item['product']->brand }}
                        </p>

                        <p class="text-sm text-text-muted">
                            {{ $item['product']->model }}
                        </p>

                        <p class="text-gold mt-1">
                            $ {{ number_format($item['product']->price) }}
                        </p>

                        <p class="text-sm mt-1">
                            Qty: {{ $item['qty'] }}
                        </p>
                    </div>

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
