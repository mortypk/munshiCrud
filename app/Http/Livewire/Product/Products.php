<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\View\Components\BaseLayout;

class Products extends Component
{
    public $activeModal="";
    public Product $product;

    public function render()
    {
        $products = Product::with('category','user','tags')->paginate(50);
        return view('livewire.product.index', ['products' => $products])
        ->layout(BaseLayout::class);
    }
    public function openModal(Product $product)
    {
        $this->product=$product;
        $this->activeModal='productModal';
    }
}
