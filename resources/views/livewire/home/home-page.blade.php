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
            <div class="aspect-square rounded-2xl bg-surface"></div>

        </div>
    </section>

    {{-- FEATURED --}}
    <section class="bg-bg py-24 border-t border-border">
        <div class="max-w-7xl mx-auto px-4">

            <h2 class="text-text text-2xl font-semibold mb-12">
                Featured Timepieces
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @for ($i = 0; $i < 4; $i++)
                    <div class="bg-surface border border-border rounded-lg p-4">

                        <div class="aspect-square bg-bg rounded mb-4"></div>

                        <p class="text-text-subtle text-xs">
                            Brand Name
                        </p>

                        <p class="text-text font-medium">
                            Model Name
                        </p>

                        <p class="text-gold mt-2 text-sm">
                            $4,500
                        </p>
                    </div>
                @endfor
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
