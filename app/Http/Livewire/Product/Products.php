<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\View\Components\BaseLayout;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $activeModal="";
    public Product $product;
    protected $rules = [
        'product.id' => 'nullable|number',
        'product.name' => 'required|min:6',
        'product.description' => 'required|min:6',
        'product.price' => 'number',
        'product.stock' => 'number',
    ];
    public function render()
    {
        $products = Product::with('category','user','tags')->paginate(50);
        return view('livewire.product.index', ['products' => $products])
        ->layout(BaseLayout::class);
    }
    public function newProductModal()
    {
        $this->product=new Product;
        $this->activeModal='productModal';
    }
    public function editProductModal(Product $product)
    {
        $this->product=$product;
        $this->activeModal='productModal';
    }
    public function addProduct()
    {
        $this->product->category_id=1;
        $this->product->user_id=1;
        $this->product->save();
        $this->activeModal='';
    }
    public function updateProduct()
    {
        $this->product->update();
        $this->activeModal='';
    }
}
