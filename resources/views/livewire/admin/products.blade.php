@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- Page Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Products</h1>
            <p class="text-sm text-gray-500">Manage your luxury watch inventory</p>
        </div>

        <button wire:click="create"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow">
            + Add Product
        </button>
    </div>

    <!-- Card -->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">

        <div class="p-6 border-b">
            <h2 class="font-semibold text-gray-700">All Products</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Brand</th>
                        <th class="px-6 py-3">Model</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Condition</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $product->brand }}</td>
                            <td class="px-6 py-4">{{ $product->model }}</td>
                            <td class="px-6 py-4 text-indigo-600 font-semibold">${{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4">{{ ucfirst($product->condition) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full
                                    {{ $product->status == 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' }}">
                                    {{ ucfirst($product->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button wire:click="edit({{ $product->id }})"
                                    class="text-indigo-600 hover:underline">Edit</button>
                                <button wire:click="delete({{ $product->id }})"
                                    class="text-red-600 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12">
                                <div class="flex flex-col items-center">
                                    <div class="text-5xl mb-3">⌚</div>
                                    <p class="text-gray-500 font-medium">No products yet</p>
                                    <p class="text-sm text-gray-400 mb-4">Start by adding your first luxury watch</p>
                                    <button wire:click="create"
                                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
                                        Add First Product
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
