<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;

#[Layout('layouts.admin')]
class Users extends Component
{
    public string $search = '';

    public ?int $editingId = null;
    public ?int $deleteId = null;

    public bool $showRoleModal = false;
    public bool $confirmingDelete = false;

    public string $role = 'user';

    public function updatedSearch(): void
    {
        // for future pagination
        // $this->resetPage();
    }

    public function editRole(int $id): void
    {
        $user = User::findOrFail($id);

        $this->editingId = $user->id;
        $this->role = $user->role;
        $this->showRoleModal = true;
    }

    public function updateRole(): void
    {
        $this->validate([
            'role' => 'required|in:user,admin',
        ]);

        User::findOrFail($this->editingId)
            ->update(['role' => $this->role]);

        $this->showRoleModal = false;
        $this->editingId = null;
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete(): void
    {
        User::findOrFail($this->deleteId)->delete();

        $this->confirmingDelete = false;
        $this->deleteId = null;
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::where(function ($query) {
                    $query
                        ->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                        ->orWhere('role', 'like', "%{$this->search}%");
                })
                ->latest()
                ->get(),
        ]);
    }
}
