<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\View\Components\BaseLayout;

class Products extends Component
{
    public function render()
    {
        $products = Product::with('category','user')->paginate();
        return view('livewire.product.index', ['products' => $products])
        ->layout(BaseLayout::class);
    }
}
