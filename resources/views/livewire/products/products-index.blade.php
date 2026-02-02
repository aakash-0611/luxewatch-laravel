<div class="bg-bg min-h-screen">

    <section class="max-w-7xl mx-auto px-4 py-28">

        <h1 class="text-text text-3xl text-center font-semibold mb-12">
            Our Collection
        </h1>

        <div class="grid lg:grid-cols-4 gap-12">

            {{-- SIDEBAR --}}
            <aside class="lg:col-span-1 space-y-8">

                <div>
                    <h3 class="text-text font-medium mb-4">
                        Filter
                    </h3>

                    <button wire:click="resetFilters"
                            class="text-sm text-gold hover:underline">
                        Reset Filters
                    </button>
                </div>

                {{-- Brand --}}
                <div>
                    <label class="text-sm text-text-muted block mb-2">
                        Brand
                    </label>

                    <select wire:model.live="brand"
                            class="w-full bg-surface border border-border rounded px-3 py-2 text-text">
                        <option value="">All Brands</option>
                        @foreach($brands as $b)
                            <option value="{{ $b }}">{{ $b }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Condition --}}
                <div>
                    <label class="text-sm text-text-muted block mb-2">
                        Condition
                    </label>

                    <select wire:model.live="condition"
                            class="w-full bg-surface border border-border rounded px-3 py-2 text-text">
                        <option value="">All</option>
                        <option value="new">New</option>
                        <option value="used">Used</option>
                    </select>
                </div>

                {{-- Sort --}}
                <div>
                    <label class="text-sm text-text-muted block mb-2">
                        Sort by
                    </label>

                    <select wire:model.live="sort"
                            class="w-full bg-surface border border-border rounded px-3 py-2 text-text">
                        <option value="latest">Latest</option>
                        <option value="price_low">Price: Low to High</option>
                        <option value="price_high">Price: High to Low</option>
                    </select>
                </div>

            </aside>

            {{-- PRODUCTS GRID --}}
            <div class="lg:col-span-3">

                @if($products->isEmpty())
                    <p class="text-text-muted">
                        No products match your filters.
                    </p>
                @else
                    <div class="grid grid-cols-3 md:grid-cols-4 gap-6">

                        @foreach($products as $product)
                            <a href="/products/{{ $product->id }}"
                               class="bg-surface border border-border rounded-xl p-4
                                      hover:border-gold transition">

                                <div class="aspect-square bg-bg rounded mb-4 overflow-hidden">
                                    <img
                                        src="{{ asset('storage/' . $product->image_url) }}"
                                        alt="{{ $product->model }}"
                                        class="w-full h-full object-cover"
                                    />
                                </div>

                                <p class="text-text-subtle text-xs">
                                    {{ $product->brand }}
                                </p>

                                <p class="text-text font-medium">
                                    {{ $product->model }}
                                </p>

                                <p class="text-gold mt-2 text-sm">
                                    ${{ number_format($product->price, 2) }}
                                </p>

                            </a>
                        @endforeach

                    </div>
                @endif

            </div>

        </div>

    </section>

</div>
