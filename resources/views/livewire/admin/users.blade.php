<div class="p-4">
    <h2 class="text-xl font-bold mb-4">User Management</h2>

    @if (session()->has('message'))
        <div class="bg-green-200 p-2 mb-3">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-4">
        <input type="text" wire:model="name" placeholder="Name" class="border p-2">
        <input type="email" wire:model="email" placeholder="Email" class="border p-2">
        <input type="password" wire:model="password" placeholder="Password" class="border p-2">

        @if($isEdit)
            <button wire:click="update" class="bg-blue-500 text-white p-2">Update</button>
            <button wire:click="resetInput" class="bg-gray-500 text-white p-2">Cancel</button>
        @else
            <button wire:click="store" class="bg-green-500 text-white p-2">Create</button>
        @endif
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-t">
                <td class="p-2">{{ $user->name }}</td>
                <td class="p-2">{{ $user->email }}</td>
                <td class="p-2">
                    <button wire:click="edit({{ $user->id }})" class="bg-yellow-400 p-1">Edit</button>
                    <button wire:click="delete({{ $user->id }})" class="bg-red-500 text-white p-1">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $users->links() }}
    </div>
</div>
