<div class="bg-bg min-h-screen">

    <section class="max-w-7xl mx-auto px-4 py-28 grid md:grid-cols-2 gap-16 items-start">

        {{-- Product Image --}}
        <div class="aspect-square bg-surface rounded-2xl"></div>

        {{-- Product Info --}}
        <div>
            <p class="text-text-subtle text-sm mb-2">
                Brand Name
            </p>

            <h1 class="text-text text-3xl md:text-4xl font-semibold mb-4">
                Watch Model Name
            </h1>

            <p class="text-gold text-xl font-medium mb-6">
                $4,500
            </p>

            <p class="text-text-muted max-w-md mb-10">
                This is a placeholder description for the product detail page.
                Detailed specifications, condition, and authenticity information
                will appear here.
            </p>

            {{-- Actions --}}
            <div class="flex gap-4">
                <button wire:click="addToCart"
                    class="px-8 py-3 bg-gold text-black rounded-full">
                    Add to Cart
                </button>

                @if($inWishlist)
                <button wire:click="removeFromWishlist"
                    class="px-8 py-3 border border-gold text-gold rounded-full">
                    Remove from Wishlist
                </button>
            @else
                <button wire:click="toggleWishlist"
                    class="px-8 py-3 border border-border text-text rounded-full">
                    Add to Wishlist
                </button>
            @endif

            </div>
        </div>

    </section>

</div>
