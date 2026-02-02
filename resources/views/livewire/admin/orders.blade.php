<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Orders</h1>
            <p class="text-gray-500">Manage customer orders</p>
        </div>
        <div class="w-64">
            <input
                type="text"
                wire:model.debounce.300ms="search"
                placeholder="Search Orders..."
                class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-indigo-500"
            >
        </div>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left">Order #</th>
                    <th class="px-6 py-3 text-left">Customer</th>
                    <th class="px-6 py-3 text-left">Total</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Date</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y text-gray-900">
                @forelse($orders as $order)
                    <tr>
                        <td class="px-6 py-4">#{{ $order->id }}</td>
                        <td class="px-6 py-4">
                            {{ $order->user->full_name ?? 'Guest' }}
                        </td>
                        <td class="px-6 py-4 font-semibold">
                            ${{ number_format($order->total, 2) }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full
                                @class([
                                    'bg-yellow-100 text-yellow-700' => $order->status === 'pending',
                                    'bg-green-100 text-green-700' => $order->status === 'paid',
                                    'bg-blue-100 text-blue-700' => $order->status === 'shipped',
                                    'bg-red-100 text-red-700' => $order->status === 'cancelled',
                                ])">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button
                                wire:click="editStatus({{ $order->id }})"
                                class="text-indigo-600 hover:underline text-sm">
                                Update
                            </button>
                            <button
                                wire:click="confirmDelete({{ $order->id }})"
                                class="text-red-600 hover:underline text-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            No orders found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- STATUS MODAL -->
    @if($showStatusModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 text-gray-900">
        <div class="bg-white rounded-xl w-full max-w-sm p-6 space-y-4">
            <h2 class="text-lg font-semibold">Update Order Status</h2>

            <select wire:model="status" class="w-full border rounded px-3 py-2">
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
                <option value="shipped">Shipped</option>
                <option value="cancelled">Cancelled</option>
            </select>

            <div class="flex justify-end gap-3 pt-4">
                <button
                    wire:click="$set('showStatusModal', false)"
                    class="px-4 py-2 border rounded">
                    Cancel
                </button>
                <button
                    wire:click="updateStatus"
                    class="px-4 py-2 bg-indigo-600 text-white rounded">
                    Update
                </button>
            </div>
        </div>
    </div>
    @endif

    <!-- DELETE CONFIRM -->
    @if($confirmingDelete)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-xl w-full max-w-sm p-6 space-y-4">
            <h2 class="text-lg font-semibold">Delete Order</h2>
            <p class="text-sm text-gray-600">
                This action cannot be undone.
            </p>

            <div class="flex justify-end gap-3 pt-4">
                <button
                    wire:click="$set('confirmingDelete', false)"
                    class="px-4 py-2 border rounded">
                    Cancel
                </button>
                <button
                    wire:click="delete"
                    class="px-4 py-2 bg-red-600 text-white rounded">
                    Delete
                </button>
            </div>
        </div>
    </div>
    @endif

</div>
