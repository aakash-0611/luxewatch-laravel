<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Products</h1>
            <p class="text-gray-500">Manage your luxury watch inventory</p>
        </div>

        <button
            type="button"
            wire:click="openModal"
            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700"
        >
            + Add Product
        </button>

        <div class="w-64">
            <input
                type="text"
                wire:model.debounce.300ms="search"
                placeholder="Search products..."
                class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-indigo-500"
            >
        </div>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left">Brand</th>
                    <th class="px-6 py-3 text-left">Model</th>
                    <th class="px-6 py-3 text-left">Price</th>
                    <th class="px-6 py-3 text-left">Condition</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($products as $product)
                    <tr>
                        <td class="px-6 py-4">{{ $product->brand }}</td>
                        <td class="px-6 py-4">{{ $product->model }}</td>
                        <td class="px-6 py-4 font-semibold">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4">{{ ucfirst($product->cond) }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full
                                {{ $product->active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $product->active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button
                                wire:click="edit({{ $product->id }})"
                                class="text-indigo-600 hover:underline text-sm">
                                Edit
                            </button>

                            <button
                                wire:click="confirmDelete({{ $product->id }})"
                                class="text-red-600 hover:underline text-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            {{ $search ? 'No matching products found.' : 'No products yet.' }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- MODAL -->
        @if($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-xl w-full max-w-lg p-6 space-y-4">

        <h2 class="text-lg font-semibold">
            {{ $editingId ? 'Edit Product' : 'Add Product' }}
        </h2>


        <input wire:model.defer="brand" type="text" placeholder="Brand"
               class="w-full border rounded px-3 py-2">

        <input wire:model.defer="model" type="text" placeholder="Model"
               class="w-full border rounded px-3 py-2">

        <input wire:model.defer="price" type="number" step="0.01" placeholder="Price"
               class="w-full border rounded px-3 py-2">

        <input wire:model.defer="cond" type="text" placeholder="Condition"
               class="w-full border rounded px-3 py-2">
    @endif
        <!-- IMAGE UPLOAD -->
        @if($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-xl w-full max-w-lg p-6">

            <form wire:submit.prevent="save" class="space-y-4">

                <h2 class="text-lg font-semibold">Add Product</h2>

                <div>
                    <input wire:model.defer="brand" type="text"
                        placeholder="Brand"
                        class="w-full border rounded px-3 py-2">
                    @error('brand') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <input wire:model.defer="model" type="text"
                        placeholder="Model"
                        class="w-full border rounded px-3 py-2">
                    @error('model') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <input wire:model.defer="price" type="number" step="0.01"
                        placeholder="Price"
                        class="w-full border rounded px-3 py-2">
                    @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <input wire:model.defer="cond" type="text"
                        placeholder="Condition"
                        class="w-full border rounded px-3 py-2">
                    @error('cond') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <input type="file" wire:model="image" class="w-full text-sm">
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}"
                            class="mt-3 h-32 w-32 object-cover rounded-lg border">
                    @endif
                </div>

                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" wire:model.defer="active">
                    Active
                </label>

                <div class="flex justify-end gap-3 pt-4">
                    <button type="button"
                            wire:click="closeModal"
                            class="px-4 py-2 border rounded">
                        Cancel
                    </button>

                    <button
                    type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded"
                >
                    {{ $editingId ? 'Update' : 'Save' }}
                </button>

                </div>

            </form>
        </div>
    </div>
    @endif
    <!-- DELETE CONFIRMATION -->
     @if($confirmingDelete)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-xl w-full max-w-sm p-6 space-y-4">

            <h2 class="text-lg font-semibold text-gray-900">
                Delete Product
            </h2>

            <p class="text-gray-600 text-sm">
                Are you sure you want to delete this product? This action cannot be undone.
            </p>

            <div class="flex justify-end gap-3 pt-4">
                <button
                    wire:click="$set('confirmingDelete', false)"
                    type="button"
                    class="px-4 py-2 border rounded">
                    Cancel
                </button>

                <button
                    wire:click="delete"
                    type="button"
                    class="px-4 py-2 bg-red-600 text-white rounded">
                    Delete
                </button>
            </div>

        </div>
    </div>
    @endif


</div>
