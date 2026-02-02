<section class="bg-black border-b border-border">
    <div class="max-w-7xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-semibold mb-2">Our Collection</h1>
        <p class="text-text-muted max-w-xl">
            Explore a curated selection of elite timepieces designed
            for precision, elegance, and lasting value.
        </p>
    </div>
</section>
<section class="bg-black py-20">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-10">

        {{-- Filters --}}
        <aside class="hidden md:block space-y-8">
            <div>
                <h3 class="text-sm font-medium mb-4">Condition</h3>
                <div class="space-y-2 text-sm text-text-muted">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="accent-gold">
                        New
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="accent-gold">
                        Used
                    </label>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium mb-4">Price Range</h3>
                <p class="text-text-muted text-sm">Coming soon</p>
            </div>
        </aside>

        {{-- Product Grid --}}
        <div class="md:col-span-3">

            {{-- Sort --}}
            <div class="flex justify-between items-center mb-8">
                <p class="text-sm text-text-muted">Showing all watches</p>

                <select class="bg-surface border border-border text-sm px-3 py-2 rounded">
                    <option>Sort by</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                </select>
            </div>

            {{-- Grid --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">

                @for ($i = 0; $i < 12; $i++)
                    <div class="bg-surface border border-border rounded-lg overflow-hidden hover:border-gold transition group">

                        <div class="aspect-square bg-black"></div>

                        <div class="p-4">
                            <p class="text-xs text-text-muted">Brand Name</p>
                            <p class="text-sm font-medium">Model Name</p>

                            <div class="flex justify-between items-center mt-3">
                                <span class="text-gold text-sm">$5,200</span>
                                <span class="text-xs text-text-muted">New</span>
                            </div>
                        </div>

                    </div>
                @endfor

            </div>

        </div>
    </div>
</section>
