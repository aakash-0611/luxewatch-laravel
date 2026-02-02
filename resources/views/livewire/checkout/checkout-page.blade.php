<div class="bg-bg min-h-screen">

    <section class="max-w-7xl mx-auto px-4 py-28 grid lg:grid-cols-3 gap-16">

        {{-- LEFT: Checkout Form --}}
        <div class="lg:col-span-2">

            <h1 class="text-text text-3xl font-semibold mb-8">
                Checkout
            </h1>

            {{-- Shipping Information --}}
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

                        <input wire:model="address" type="text" placeholder="Address Line"
                            class="bg-bg border border-border rounded px-4 py-3 text-text sm:col-span-2">

                        <input wire:model="city" type="text" placeholder="City"
                            class="bg-bg border border-border rounded px-4 py-3 text-text">

                        <input wire:model="postal_code" type="text" placeholder="Postal Code"
                            class="bg-bg border border-border rounded px-4 py-3 text-text">
                    </div>

                    <button type="submit"
                        class="px-10 py-4 bg-gold text-black rounded-full tracking-wider">
                        Place Order
                    </button>

                </form>

            </div>

            {{-- Place Order --}}
            <button
                class="px-10 py-4 bg-gold text-black text-sm tracking-wider rounded-full hover:opacity-90 transition">
                Place Order
            </button>

        </div>

        {{-- RIGHT: Order Summary --}}
        <div class="border border-border rounded-xl p-6 h-fit">

            <h2 class="text-text font-medium mb-6">
                Order Summary
            </h2>

            <div class="space-y-4 text-sm">
                <div class="flex justify-between text-text-muted">
                    <span>Subtotal</span>
                    <span>$4,500</span>
                </div>

                <div class="flex justify-between text-text-muted">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>

                <div class="border-t border-border pt-4 flex justify-between text-text font-medium">
                    <span>Total</span>
                    <span>$4,500</span>
                </div>
            </div>

        </div>

    </section>

</div>
