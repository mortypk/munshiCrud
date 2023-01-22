<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;
use App\View\Components\BaseLayout;

class Invoice extends Component
{
    public function render()
    {
        return view('livewire.invoice.invoice')
        ->layout(BaseLayout::class);
    }
}
