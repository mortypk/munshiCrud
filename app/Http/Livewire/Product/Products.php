<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use App\View\Components\BaseLayout;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Products extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $activeModal="",$search='';
    public $tags=[];
    public $recordPerPage=25;
    public Product $product;
    protected $rules = [
        'product.id' => 'nullable|number',
        'product.name' => 'required|min:6',
        'product.description' => 'required|min:6',
        'product.price' => 'number',
        'product.stock' => 'number',
        'product.category_id' => 'number',
    ];
    public function render()
    {
        $products = Product::with('category','user','tags')
        ->where('name','like', '%'.$this->search.'%')
        ->orWhere('description','like', '%'.$this->search.'%')
        ;
        return view('livewire.product.index', ['products' => $products->paginate($this->recordPerPage)])
        ->layout(BaseLayout::class);
    }
    public function newProductModal()
    {
        $this->product=new Product;
        $this->activeModal='productModal';
    }
    public function editProductModal(Product $product)
    {
        $this->product=new Product;
        $this->product=$product;
        $tags=$product->tags()->get()->toArray();
        // $this->tags=[];
        $this->tags=Arr::pluck($tags,'id');
        // dd($this->tags);
        $this->activeModal='productModal';
    }
    public function addProduct()
    {
        $this->authorize('create',$this->product);
        $this->product->user_id= auth()->id();
        $this->product->save();
        $this->product->tags()->sync($this->tags);
        $this->activeModal='';
    }
    public function updateProduct()
    {
        $this->product->update();
        $this->product->tags()->sync($this->tags);
        $this->activeModal='';
    }
    public function deleteProduct(Product $product)
    {
        $product->delete();
        $count = Product::paginate($this->recordPerPage)->count();
        // if empty page 
        if($count == 0){
            // then goto previous page
            $this->previousPage();
        }
        $this->product=new Product;
        $this->activeModal='';
    }
}
