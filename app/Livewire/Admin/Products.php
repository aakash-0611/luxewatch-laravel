<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.admin')]
class Products extends Component
{
    use WithFileUploads;
    use WithPagination;

    // UI state
    public bool $showModal = false;
    public ?int $editingId = null;
    public bool $confirmingDelete = false;
    public ?int $deleteId = null;
    public string $search = '';

    // Form fields
    public string $brand = '';
    public string $model = '';
    public float|string $price = '';
    public string $cond = 'new';
    public bool $active = true;

    // Image upload
    public $image;

    protected $queryString = ['search'];

    protected function rules(): array
    {
        return [
            'brand' => 'required|string|max:80',
            'model' => 'required|string|max:160',
            'price' => 'required|numeric|min:0',
            'cond'  => 'required|in:new,used',
            'image' => $this->editingId
                ? 'nullable|image|mimes:jpg,jpeg,png,webp,avif|max:2048'
                : 'required|image|mimes:jpg,jpeg,png,webp,avif|max:2048',
        ];
    }

    public function updatingSearch(): void
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
        $this->validate();

        $data = [
            'brand'  => $this->brand,
            'model'  => $this->model,
            'price'  => $this->price,
            'cond'   => $this->cond,
            'active' => $this->active,
        ];

        // Store new image if uploaded
        if ($this->image) {
            // Delete old image when updating
            if ($this->editingId) {
                $old = Product::find($this->editingId);
                if ($old?->image_url && Storage::disk('public')->exists($old->image_url)) {
                    Storage::disk('public')->delete($old->image_url);
                }
            }

            $data['image_url'] = $this->image->store('products', 'public');
        }

        Product::updateOrCreate(
            ['id' => $this->editingId],
            $data
        );

        $this->closeModal();
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->brand = '';
        $this->model = '';
        $this->price = '';
        $this->cond  = 'new';
        $this->active = true;
        $this->image = null;
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
        $this->image = null;

        $this->showModal = true;
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete(): void
    {
        $product = Product::findOrFail($this->deleteId);

        // Delete image from storage
        if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
            Storage::disk('public')->delete($product->image_url);
        }

        $product->delete();

        $this->confirmingDelete = false;
        $this->deleteId = null;
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
                ->paginate(10),
        ]);
    }
}
