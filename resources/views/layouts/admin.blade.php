<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LuxeWatch Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 bg-black text-white flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-gray-800">
            ⌚ LuxeWatch
        </div>

        <nav class="flex-1 p-4 space-y-2 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-800">Dashboard</a>
            <a href="{{ route('admin.products') }}" class="block px-4 py-2 rounded hover:bg-gray-800">Products</a>
            <a href="{{ route('admin.orders') }}" class="block px-4 py-2 rounded hover:bg-gray-800">Orders</a>
            <a href="{{ route('admin.users') }}" class="block px-4 py-2 rounded hover:bg-gray-800">Users</a>
        </nav>

        <div class="p-4 border-t border-gray-800">
            <form method="POST" action="/logout">
                @csrf
                <button class="w-full text-left px-4 py-2 hover:bg-red-600 rounded">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-8">
        {{ $slot }}
    </main>

</div>

@livewireScripts
</body>
</html>
