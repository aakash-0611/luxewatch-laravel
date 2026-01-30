<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Manage Orders</h1>

    <div class="bg-white p-6 rounded-xl shadow">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="p-2">Order ID</th>
                    <th class="p-2">User</th>
                    <th class="p-2">Total</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Change Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="border-b">
                    <td class="p-2">#{{ $order->id }}</td>
                    <td class="p-2">{{ $order->user->full_name }}</td>
                    <td class="p-2">${{ $order->total }}</td>
                    <td class="p-2 capitalize">{{ $order->status }}</td>
                    <td class="p-2 space-x-2">
                        <button wire:click="updateStatus({{ $order->id }}, 'paid')" class="bg-green-500 text-white px-2 py-1 rounded">Paid</button>
                        <button wire:click="updateStatus({{ $order->id }}, 'shipped')" class="bg-blue-500 text-white px-2 py-1 rounded">Shipped</button>
                        <button wire:click="updateStatus({{ $order->id }}, 'cancelled')" class="bg-red-600 text-white px-2 py-1 rounded">Cancel</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
