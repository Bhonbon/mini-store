<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $products = Product::where('product', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->orWhere('type', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('livewire.search', [
            'products' => $products,
        ]);
    }
}
