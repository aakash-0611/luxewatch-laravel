<div class="bg-bg min-h-screen">

    <section class="max-w-6xl mx-auto px-4 py-28">

        <h1 class="text-text text-3xl font-semibold mb-4">
            My Orders
        </h1>

        <p class="text-text-muted mb-10">
            Track your recent orders and delivery status.
        </p>

        {{-- Orders Table --}}
        <div class="border border-border rounded-xl overflow-hidden">

            {{-- Header --}}
            <div class="grid grid-cols-4 gap-4 px-6 py-4 border-b border-border text-sm text-text-subtle">
                <div>Order</div>
                <div>Status</div>
                <div>Estimated Arrival</div>
                <div>Total</div>
            </div>

            @forelse($orders as $order)
            <div class="grid grid-cols-4 gap-4 px-6 py-5 border-b border-border text-sm">
                <div class="text-text font-medium">
                    #LW-{{ $order->id }}
                </div>

                <div class="text-gold">
                    {{ ucfirst($order->status) }}
                </div>

                <div class="text-text-muted">
                    {{ $order->estimated_arrival?->format('d M Y') }}
                </div>

                <div class="text-text">
                    ${{ number_format($order->total, 2) }}
                </div>
            </div>
        @empty
            <div class="px-6 py-12 text-center text-text-muted">
                You haven’t placed any orders yet.
            </div>
        @endforelse

            {{-- Empty State (keep commented for later logic) --}}
            {{--
            <div class="px-6 py-12 text-center text-text-muted">
                You haven’t placed any orders yet.
            </div>
            --}}

        </div>

    </section>

</div>
