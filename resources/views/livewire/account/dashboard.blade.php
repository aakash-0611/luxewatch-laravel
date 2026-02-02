<div class="bg-bg min-h-screen">

    <section class="max-w-6xl mx-auto px-4 py-28">

        <h1 class="text-text text-3xl font-semibold mb-4">
            My Account
        </h1>

        <p class="text-text-muted mb-12">
            Manage your profile, orders, and saved items.
        </p>

        {{-- Account Actions --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <a href="/account/orders"
               class="border border-border rounded-xl p-6 hover:border-gold transition">
                <h3 class="text-text font-medium mb-2">
                    My Orders
                </h3>
                <p class="text-text-muted text-sm">
                    View and track your orders.
                </p>
            </a>

            <a href="/wishlist"
               class="border border-border rounded-xl p-6 hover:border-gold transition">
                <h3 class="text-text font-medium mb-2">
                    Wishlist
                </h3>
                <p class="text-text-muted text-sm">
                    Watches you’ve saved for later.
                </p>
            </a>

            <a href="/profile"
               class="border border-border rounded-xl p-6 hover:border-gold transition">
                <h3 class="text-text font-medium mb-2">
                    Profile Settings
                </h3>
                <p class="text-text-muted text-sm">
                    Update your personal information.
                </p>
            </a>

        </div>

    </section>

</div>
