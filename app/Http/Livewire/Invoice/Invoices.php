<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Product;
use Livewire\Component;
use App\View\Components\BaseLayout;

class Invoices extends Component
{
    public $search ='';
    public $showDropdown = false;
    public $selectedId=0;
    public $products;
    public function render()
    {
        $this->products = Product::where('name','like', '%'.$this->search.'%')
        ->orWhere('description','like', '%'.$this->search.'%')->get()
        ;
        return view('livewire.invoice.index')
        ->layout(BaseLayout::class);
    }
    public function emptyProp()
    {
        $this->search="";
        $this->products="";
    }
    public function archive()
    {
        $this->showDropdown = false;
    }
 
    public function delete()
    {
        $this->showDropdown = false;
    }
    
    public function selectContact()
    {
        $contact = $this->prdoucts[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('show-contact', $contact['id']));
        }
    }
}
