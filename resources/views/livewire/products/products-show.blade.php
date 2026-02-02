<div class="bg-bg min-h-screen">

    <section class="max-w-7xl mx-auto px-4 py-28 grid lg:grid-cols-2 gap-16">

        {{-- PRODUCT IMAGE --}}
        <div class="bg-surface border border-border rounded-xl overflow-hidden">
            <div class="aspect-square bg-bg">
                <img
                    src="{{ asset('storage/' . $product->image_url) }}"
                    alt="{{ $product->model }}"
                    class="w-full h-full object-cover"
                >
            </div>
        </div>

        {{-- PRODUCT DETAILS --}}
        <div class="flex flex-col justify-between">

            <div>
                <p class="text-text-subtle text-sm mb-2">
                    {{ $product->brand }}
                </p>

                <h1 class="text-text text-3xl font-semibold mb-4">
                    {{ $product->model }}
                </h1>

                <p class="text-gold text-xl font-medium mb-6">
                    ${{ number_format($product->price, 2) }}
                </p>

                <p class="text-text-muted leading-relaxed mb-8">
                    This timepiece embodies precision craftsmanship and timeless
                    elegance. Designed for those who appreciate heritage, quality,
                    and refined engineering.
                </p>

                <p class="text-text-muted text-sm mb-8">
                    Condition:
                    <span class="text-text capitalize">
                        {{ $product->cond }}
                    </span>
                </p>
            </div>

            {{-- ACTIONS --}}
            <div class="flex flex-col sm:flex-row gap-4">

                {{-- ADD TO CART --}}
                <button
                    wire:click="addToCart"
                    class="flex-1 px-8 py-4 bg-gold text-black
                           rounded-full tracking-wider
                           hover:opacity-90 transition">
                    Add to Cart
                </button>

                {{-- WISHLIST --}}
                @auth
                    @if($inWishlist)
                        <button
                            wire:click="removeFromWishlist"
                            class="flex-1 px-8 py-4 border border-gold
                                   text-gold rounded-full
                                   hover:bg-gold hover:text-black transition">
                            Remove from Wishlist
                        </button>
                    @else
                        <button
                            wire:click="addToWishlist"
                            class="flex-1 px-8 py-4 border border-border
                                   text-text rounded-full
                                   hover:border-gold hover:text-gold transition">
                            Add to Wishlist
                        </button>
                    @endif
                @else
                    <a href="/login"
                       class="flex-1 px-8 py-4 border border-border
                              text-text rounded-full text-center
                              hover:border-gold hover:text-gold transition">
                        Login to Wishlist
                    </a>
                @endauth

            </div>

        </div>

    </section>

</div>
