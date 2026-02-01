<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use App\Models\Product;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class Products extends Component
{
    use WithFileUploads;
    use WithPagination;

    public bool $showModal = false;
    public ?int $editingId = null;
    public bool $confirmingDelete = false;
    public ?int $deleteId = null;
    public string $search = '';

    // Form fields
    public string $brand = '';
    public string $model = '';
    public float|string $price = '';
    public string $cond = '';
    public bool $active = true;

    // Image
    public $image; // Livewire temp upload

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openModal(): void
    {
        $this->resetForm();
        $this->editingId = null;
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function save(): void
    {
        $rules = [
            'brand' => 'required|string|max:80',
            'model' => 'required|string|max:160',
            'price' => 'required|numeric|min:0',
            'cond'  => 'required|string|max:40',
            'image' => $this->editingId
                ? 'nullable|mimes:jpg,jpeg,png,webp|max:2048'
                : 'required|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        $this->validate($rules);

        $data = [
            'brand' => $this->brand,
            'model' => $this->model,
            'price' => $this->price,
            'cond'  => $this->cond,
            'active'=> $this->active,
        ];

        if ($this->image) {
            $data['image_url'] = $this->image->store('products', 'public');
        }

        Product::updateOrCreate(
            ['id' => $this->editingId],
            $data
        );

        $this->closeModal();
    }


    private function resetForm(): void
    {
        $this->brand = '';
        $this->model = '';
        $this->price = '';
        $this->cond  = '';
        $this->active = true;
        $this->image = null;
    }

    public function render()
    {
        return view('livewire.admin.products', [
            'products' => Product::when(
                    $this->search !== '',
                    fn ($q) =>
                        $q->where('brand', 'like', "%{$this->search}%")
                        ->orWhere('model', 'like', "%{$this->search}%")
                        ->orWhere('cond', 'like', "%{$this->search}%")
                )
                ->latest()
                ->get(),
        ]);
    }


    public function edit(int $id): void
    {
        $product = Product::findOrFail($id);

        $this->editingId = $product->id;
        $this->brand = $product->brand;
        $this->model = $product->model;
        $this->price = $product->price;
        $this->cond  = $product->cond;
        $this->active = $product->active;

        $this->image = null; // reset upload
        $this->showModal = true;
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete(): void
    {
        Product::findOrFail($this->deleteId)->delete();

        $this->confirmingDelete = false;
        $this->deleteId = null;
    }

}
