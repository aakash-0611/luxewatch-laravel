<div>
    <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

    <div class="grid grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500">Users</h2>
            <p class="text-3xl font-bold">{{ $totalUsers }}</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500">Products</h2>
            <p class="text-3xl font-bold">{{ $totalProducts }}</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500">Orders</h2>
            <p class="text-3xl font-bold">{{ $totalOrders }}</p>
        </div>
    </div>
</div>
