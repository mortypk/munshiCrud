<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;
use App\View\Components\BaseLayout;

class Invoices extends Component
{
    public $showDropdown = false;
    public function render()
    {
        return view('livewire.invoice.index')
        ->layout(BaseLayout::class);
    }
    public function archive()
    {
        $this->showDropdown = false;
    }
 
    public function delete()
    {
        $this->showDropdown = false;
    }
}
