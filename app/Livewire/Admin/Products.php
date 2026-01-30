<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products;

    public $brand, $model, $price, $cond, $image_url, $active = true;
    public $productId;
    public $isEditing = false;
    public $showModal = false;


    protected $rules = [
        'brand' => 'required|string|max:80',
        'model' => 'required|string|max:160',
        'price' => 'required|numeric|min:0',
        'cond'  => 'required|string|max:40',
        'image_url' => 'required|string|max:255',
        'active' => 'boolean'
    ];

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Product::latest()->get();
    }

    public function resetFields()
    {
        $this->brand = $this->model = $this->cond = $this->image_url = '';
        $this->price = '';
        $this->active = true;
        $this->isEditing = false;
    }

    public function saveProduct()
    {
        $this->validate();

        Product::create([
            'brand' => $this->brand,
            'model' => $this->model,
            'price' => $this->price,
            'cond' => $this->cond,
            'image_url' => $this->image_url,
            'active' => $this->active
        ]);

        $this->resetFields();
        $this->loadProducts();
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        $this->productId = $product->id;
        $this->brand = $product->brand;
        $this->model = $product->model;
        $this->price = $product->price;
        $this->cond = $product->cond;
        $this->image_url = $product->image_url;
        $this->active = $product->active;

        $this->isEditing = true;
    }

    public function updateProduct()
    {
        $this->validate();

        $product = Product::findOrFail($this->productId);

        $product->update([
            'brand' => $this->brand,
            'model' => $this->model,
            'price' => $this->price,
            'cond' => $this->cond,
            'image_url' => $this->image_url,
            'active' => $this->active
        ]);

        $this->resetFields();
        $this->loadProducts();
    }

    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        $this->loadProducts();
    }

    public function render()
    {
        return view('livewire.admin.products', [
            'products' => Product::latest()->get()
        ]);
    }
}
?>