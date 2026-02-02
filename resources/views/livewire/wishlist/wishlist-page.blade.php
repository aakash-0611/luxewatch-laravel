<div class="bg-bg min-h-screen">
    <section class="max-w-6xl mx-auto px-4 py-28">

        <h1 class="text-text text-3xl font-semibold mb-8">
            Wishlist
        </h1>

        @if($items->isEmpty())
            <p class="text-text-muted">
                Your wishlist is empty.
            </p>
        @else
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($items as $item)
                    <div class="border border-border rounded-xl p-4">

                        <p class="text-text font-medium mb-1">
                            {{ $item->product->brand }}
                        </p>

                        <p class="text-text-muted text-sm mb-2">
                            {{ $item->product->model }}
                        </p>

                        <p class="text-gold mb-4">
                            ${{ number_format($item->product->price, 2) }}
                        </p>

                        <div class="flex gap-4">
                            <a href="/products/{{ $item->product->id }}"
                               class="text-sm text-text underline">
                                View
                            </a>

                            <button wire:click="remove({{ $item->product->id }})"
                                    class="text-sm text-red-400">
                                Remove
                            </button>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </section>
</div>
