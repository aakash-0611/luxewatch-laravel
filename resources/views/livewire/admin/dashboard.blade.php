<div class="space-y-8">

    <!-- PAGE HEADER -->
    <div>
        <h1 class="text-3xl font-semibold text-gray-900">Dashboard</h1>
        <p class="text-gray-500 mt-1">
            Welcome back. Here’s what’s happening at LuxeWatch today.
        </p>
    </div>

    <!-- KPI CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- PRODUCTS -->
        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-sm text-gray-500">Products</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $productsCount }}
            </p>
        </div>

        <!-- ORDERS -->
        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-sm text-gray-500">Orders</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $ordersCount ?? 0 }}
            </p>
        </div>

        <!-- USERS -->
        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-sm text-gray-500">Users</p>
            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $usersCount }}
            </p>
        </div>

        <!-- REVENUE -->
        <div class="bg-black text-white rounded-2xl shadow p-6">
            <p class="text-sm text-gray-400">Total Revenue</p>
            <p class="mt-2 text-3xl font-bold">
                ${{ number_format($revenue ?? 0, 2) }}
            </p>
        </div>

    </div>

    <!-- SECOND ROW -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- ACTIVITY / PLACEHOLDER -->
        <div class="xl:col-span-2 bg-white rounded-2xl shadow p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">
                Store Overview
            </h2>

            <p class="text-sm text-gray-500">
                Orders, revenue trends, and performance charts will appear here.
            </p>

            <div class="mt-6 h-40 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400">
                Chart Placeholder
            </div>
        </div>

        <!-- QUICK ACTIONS -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">
                Quick Actions
            </h2>

            <div class="space-y-3">
                <a href="{{ route('admin.products') }}"
                   class="block px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm text-center hover:bg-indigo-700">
                    Manage Products
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg border text-sm text-center hover:bg-gray-50">
                    View Orders
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg border text-sm text-center hover:bg-gray-50">
                    Manage Users
                </a>
            </div>
        </div>

    </div>

</div>
