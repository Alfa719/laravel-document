<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function render()
    {
        $span = Product::where('type_id', null)->count();
        return view('components.sidebar', compact('span'));
    }
}