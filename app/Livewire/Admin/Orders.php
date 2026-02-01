<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Order;

#[Layout('layouts.admin')]
class Orders extends Component
{
    public string $search = '';

    public ?int $editingId = null;
    public ?int $deleteId = null;

    public bool $showStatusModal = false;
    public bool $confirmingDelete = false;

    public string $status = '';

    public function updatedSearch(): void
    {
        // if you add pagination later
        // $this->resetPage();
    }

    public function editStatus(int $id): void
    {
        $order = Order::findOrFail($id);

        $this->editingId = $order->id;
        $this->status = $order->status;
        $this->showStatusModal = true;
    }

    public function updateStatus(): void
    {
        $this->validate([
            'status' => 'required|in:pending,paid,shipped,cancelled',
        ]);

        Order::findOrFail($this->editingId)
            ->update(['status' => $this->status]);

        $this->showStatusModal = false;
        $this->editingId = null;
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete(): void
    {
        Order::findOrFail($this->deleteId)->delete();

        $this->confirmingDelete = false;
        $this->deleteId = null;
    }

    public function render()
    {
        return view('livewire.admin.orders', [
            'orders' => Order::with('user')
                ->where(function ($query) {
                    $query
                        ->where('status', 'like', "%{$this->search}%")
                        ->orWhere('id', $this->search)
                        ->orWhereHas('user', function ($q) {
                            $q->where('name', 'like', "%{$this->search}%");
                        });
                })
                ->latest()
                ->get(),
        ]);
    }
}
