<footer class="bg-black border-t border-border">
    <div class="max-w-7xl mx-auto px-4 py-16">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

            {{-- Brand --}}
            <div>
                <h3 class="text-lg font-semibold tracking-widest text-white mb-4">
                    LUXEWATCH
                </h3>

                <p class="text-sm text-text-muted leading-relaxed">
                    Curating elite timepieces that embody precision,
                    heritage, and timeless luxury.
                </p>
            </div>

            {{-- Shop --}}
            <div>
                <h4 class="text-sm font-medium text-white mb-4">
                    Shop
                </h4>

                <ul class="space-y-2 text-sm text-text-muted">
                    <li>
                        <a href="/products" class="hover:text-gold transition">
                            All Watches
                        </a>
                    </li>
                    <li>
                        <a href="/wishlist" class="hover:text-gold transition">
                            Wishlist
                        </a>
                    </li>
                    <li>
                        <a href="/cart" class="hover:text-gold transition">
                            Cart
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Company --}}
            <div>
                <h4 class="text-sm font-medium text-white mb-4">
                    Company
                </h4>

                <ul class="space-y-2 text-sm text-text-muted">
                    <li>
                        <a href="/about" class="hover:text-gold transition">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="hover:text-gold transition">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Account --}}
            <div>
                <h4 class="text-sm font-medium text-white mb-4">
                    Account
                </h4>

                <ul class="space-y-2 text-sm text-text-muted">
                    @auth
                        <li>
                            <a href="/account" class="hover:text-gold transition">
                                My Account
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="hover:text-red-400 transition">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="/login" class="hover:text-gold transition">
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="/register" class="hover:text-gold transition">
                                Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>

        </div>

        {{-- Bottom Bar --}}
        <div class="mt-16 pt-6 border-t border-border flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-xs text-text-muted">
                © {{ date('Y') }} LuxeWatch. All rights reserved.
            </p>

            <p class="text-xs text-text-muted">
                Designed & built with precision.
            </p>
        </div>

    </div>
</footer>
