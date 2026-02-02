<div>

    {{-- HERO --}}
    <section class="bg-bg">
        <div class="max-w-7xl mx-auto px-4 py-28 grid md:grid-cols-2 gap-16 items-center">

            {{-- Left Content --}}
            <div>
                <p class="text-gold tracking-widest uppercase text-sm mb-4">
                    Timeless Luxury
                </p>

                <h1 class="text-text text-4xl md:text-5xl font-semibold leading-tight mb-6">
                    Watches That <br class="hidden md:block">
                    Define Elegance
                </h1>

                <p class="text-text-muted max-w-md mb-10">
                    Discover elite timepieces crafted for those who value precision,
                    heritage, and refined design.
                </p>

                <a href="/products"
                   class="inline-flex items-center px-10 py-3 
                          bg-gold text-black text-sm tracking-wider 
                          rounded-full transition hover:opacity-90">
                    Explore Collection
                </a>
            </div>

            {{-- Right Placeholder --}}
            <div class="aspect-square rounded-2xl bg-surface">
                
            <img
                src="{{ asset('images/patek-.jpg') }}"
                alt="Luxury Watch"
                class="w-full h-full object-cover rounded-lg"
            >

            </div>

        </div>
    </section>

    {{-- FEATURED --}}
    <section class="bg-black py-24 border-t border-border">
    <div class="max-w-7xl mx-auto px-4">

        {{-- Section Header --}}
        <div class="flex items-end justify-between mb-12">
            <div>
                <p class="text-gold text-sm tracking-widest uppercase mb-2">
                    Curated Selection
                </p>

                <h2 class="text-3xl font-semibold text-text">
                    Featured Timepieces
                </h2>
            </div>

            <a href="/products"
               class="hidden md:inline text-sm text-text-muted hover:text-white transition">
                View all →
            </a>
        </div>

        {{-- Product Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            {{-- Card 1 --}}
            <div class="group bg-surface border border-border rounded-xl overflow-hidden hover:border-gold transition">
                <img
                    src="{{ asset('images/featured-1.jpg') }}"
                    alt="Luxury Watch"
                    class="w-full aspect-square object-cover"
                >

                <div class="p-4">
                    <p class="text-xs text-text-muted uppercase tracking-wide">
                        Rolex
                    </p>

                    <p class="font-medium text-text">
                        Submariner 
                    </p>

                </div>
            </div>

            {{-- Card 2 --}}
            <div class="group bg-surface border border-border rounded-xl overflow-hidden hover:border-gold transition">
                <img
                    src="{{ asset('products/omega_seamaster.png') }}"
                    alt="Luxury Watch"
                    class="w-full aspect-square object-cover"
                >

                <div class="p-4">
                    <p class="text-xs text-text-muted uppercase tracking-wide">
                        Omega
                    </p>

                    <p class="font-medium text-text">
                        Aqua Terra
                    </p>

                </div>
            </div>

            {{-- Card 3 --}}
            <div class="group bg-surface border border-border rounded-xl overflow-hidden hover:border-gold transition">
                <img
                    src="{{ asset('images/featured-3.jpg') }}"
                    alt="Luxury Watch"
                    class="w-full aspect-square object-cover"
                >

                <div class="p-4">
                    <p class="text-xs text-text-muted uppercase tracking-wide">
                        Patek Philippe
                    </p>

                    <p class="font-medium text-text">
                        Nautilus
                    </p>

                </div>
            </div>

            {{-- Card 4 --}}
            <div class="group bg-surface border border-border rounded-xl overflow-hidden hover:border-gold transition">
                <img
                    src="{{ asset('images/ap_ro.png') }}"
                    alt="Luxury Watch"
                    class="w-full aspect-square object-cover"
                >

                <div class="p-4">
                    <p class="text-xs text-text-muted uppercase tracking-wide">
                        Audemars Piguet
                    </p>

                    <p class="font-medium text-text">
                        Royal Oak
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>


    {{-- ABOUT --}}
    <section class="bg-bg py-24 border-t border-border">
        <div class="max-w-5xl mx-auto px-4 text-center">

            <h2 class="text-text text-2xl font-semibold mb-6">
                About LuxeWatch
            </h2>

            <p class="text-text-muted leading-relaxed max-w-3xl mx-auto">
                LuxeWatch is dedicated to curating elite-tier timepieces that embody
                craftsmanship, precision, and prestige. Every watch represents a
                commitment to excellence and authenticity.
            </p>

        </div>
    </section>

    {{-- OUR PROMISE --}}
    <section class="bg-bg py-24 border-t border-border">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-12 text-center">

            <div>
                <h3 class="text-text font-medium mb-2">
                    Authenticity Guaranteed
                </h3>
                <p class="text-text-muted text-sm">
                    Every watch is verified and sourced from trusted distributors.
                </p>
            </div>

            <div>
                <h3 class="text-text font-medium mb-2">
                    Precision & Craft
                </h3>
                <p class="text-text-muted text-sm">
                    Built with meticulous attention to detail and engineering.
                </p>
            </div>

            <div>
                <h3 class="text-text font-medium mb-2">
                    Premium Service
                </h3>
                <p class="text-text-muted text-sm">
                    A seamless experience from discovery to delivery.
                </p>
            </div>

        </div>
    </section>

</div>
