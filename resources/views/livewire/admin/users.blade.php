<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Users</h1>
            <p class="text-gray-500">Manage platform users and roles</p>
        </div>
        <div class="w-64">
            <input
                type="text"
                wire:model.debounce.300ms="search"
                placeholder="Search Users..."
                class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:border-indigo-500"
            >
        </div>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Role</th>
                    <th class="px-6 py-3 text-left">Joined</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($users as $user)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full
                                {{ $user->role === 'admin'
                                    ? 'bg-indigo-100 text-indigo-700'
                                    : 'bg-gray-100 text-gray-700' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4 text-right space-x-2">
                            <button
                                wire:click="editRole({{ $user->id }})"
                                class="text-indigo-600 hover:underline text-sm">
                                Change Role
                            </button>

                            <button
                                wire:click="confirmDelete({{ $user->id }})"
                                class="text-red-600 hover:underline text-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            No users found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- ROLE MODAL -->
    @if($showRoleModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-xl w-full max-w-sm p-6 space-y-4">
            <h2 class="text-lg font-semibold">Change User Role</h2>

            <select wire:model="role" class="w-full border rounded px-3 py-2">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <div class="flex justify-end gap-3 pt-4">
                <button
                    wire:click="$set('showRoleModal', false)"
                    class="px-4 py-2 border rounded">
                    Cancel
                </button>

                <button
                    wire:click="updateRole"
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
            <h2 class="text-lg font-semibold">Delete User</h2>

            <p class="text-sm text-gray-600">
                This will permanently remove the user.
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
