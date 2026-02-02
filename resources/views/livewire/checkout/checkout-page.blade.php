<div class="bg-bg min-h-screen">

    <section class="max-w-7xl mx-auto px-4 py-28 grid lg:grid-cols-3 gap-16">

        {{-- LEFT: Checkout Form --}}
        <div class="lg:col-span-2">

            <h1 class="text-text text-3xl font-semibold mb-8">
                Checkout
            </h1>

            <div class="border border-border rounded-xl p-6 mb-10">
                <h2 class="text-text font-medium mb-6">
                    Shipping Information
                </h2>

                <form wire:submit.prevent="placeOrder" class="space-y-6">

                    <div class="grid sm:grid-cols-2 gap-6">

                        <input wire:model="full_name" type="text" placeholder="Full Name"
                            class="bg-bg border border-border rounded px-4 py-3 text-text">

                        <input wire:model="phone" type="text" placeholder="Phone Number"
                            class="bg-bg border border-border rounded px-4 py-3 text-text">

                        <input wire:model="address" type="text" placeholder="Address"
                            class="bg-bg border border-border rounded px-4 py-3 text-text sm:col-span-2">

                        <input wire:model="city" type="text" placeholder="City"
                            class="bg-bg border border-border rounded px-4 py-3 text-text">

                        <input wire:model="postal_code" type="text" placeholder="Postal Code"
                            class="bg-bg border border-border rounded px-4 py-3 text-text">

                    </div>

                    <button type="submit"
                        class="px-10 py-4 bg-gold text-black rounded-full tracking-wider hover:opacity-90 transition">
                        Place Order
                    </button>

                </form>
            </div>

        </div>

        {{-- RIGHT: Order Summary --}}
        <div class="border border-border rounded-xl p-6 h-fit">

            <h2 class="text-text font-medium mb-6">
                Order Summary
            </h2>

            {{-- Items --}}
            <div class="space-y-4 mb-6">

                @forelse($cart as $item)
                    <div class="flex justify-between text-sm">

                        <div>
                            <p class="text-text font-medium">
                                {{ $item['product']->brand }}
                            </p>

                            <p class="text-text-muted text-xs">
                                {{ $item['product']->model }} × {{ $item['qty'] }}
                            </p>
                        </div>

                        <p class="text-text">
                            $ {{ number_format($item['product']->price * $item['qty']) }}
                        </p>

                    </div>
                @empty
                    <p class="text-text-muted text-sm">
                        Your cart is empty.
                    </p>
                @endforelse

            </div>

            {{-- Totals --}}
            <div class="space-y-3 text-sm border-t border-border pt-4">

                <div class="flex justify-between text-text-muted">
                    <span>Subtotal</span>
                    <span>$ {{ number_format($subtotal) }}</span>
                </div>

                <div class="flex justify-between text-text-muted">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>

                <div class="flex justify-between text-text font-semibold text-base pt-2">
                    <span>Total</span>
                    <span>$ {{ number_format($total) }}</span>
                </div>

            </div>

        </div>

    </section>

</div>
