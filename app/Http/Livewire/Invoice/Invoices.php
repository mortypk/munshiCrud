<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;
use App\View\Components\BaseLayout;

class Invoices extends Component
{
    public function render()
    {
        return view('livewire.invoice.index')
        ->layout(BaseLayout::class);
    }
}
