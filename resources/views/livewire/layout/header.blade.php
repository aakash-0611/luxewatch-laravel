<header class="sticky top-0 z-50 bg-black/80 backdrop-blur border-b border-border">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="/"
               class="text-lg font-semibold tracking-widest text-white">
                LUXEWATCH
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex items-center gap-8 text-sm text-text-muted">
                <a href="/" class="hover:text-white transition">Home</a>
                <a href="/products" class="hover:text-white transition">Products</a>
                <a href="/about" class="hover:text-white transition">About</a>
                <a href="/contact" class="hover:text-white transition">Contact</a>
            </nav>

            {{-- Actions --}}
            <div class="flex items-center gap-4">

                <a href="/wishlist" class="hover:text-white transition">🤍</a>

                <a href="/cart" class="relative hover:text-white transition">
                    🛒
                    @if($this->cartCount > 0)
                        <span
                            class="absolute -top-1 -right-2 bg-gold text-black text-xs
                                rounded-full px-1.5 min-w-[18px] text-center">
                            {{ $this->cartCount }}
                        </span>
                    @endif
                </a>


                @auth
                    <a href="/account" class="hidden md:inline text-sm hover:text-white transition">
                        Account
                    </a>
                @else
                    <a href="/login" class="hidden md:inline text-sm hover:text-white transition">
                        Login
                    </a>
                @endauth

                <button wire:click="toggleMobileMenu" class="md:hidden text-xl">☰</button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    @if($mobileMenuOpen)
        <div class="md:hidden bg-black border-t border-border">
            <nav class="flex flex-col px-4 py-4 gap-4 text-sm text-text-muted">
                <a href="/">Home</a>
                <a href="/products">Products</a>
                <a href="/about">About</a>
                <a href="/contact">Contact</a>

                @auth
                    <a href="/account" class="pt-2 border-t border-border">Account</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-left text-red-400">Logout</button>
                    </form>
                @else
                    <a href="/login" class="pt-2 border-t border-border">Login</a>
                @endauth
            </nav>
        </div>
    @endif
</header>
