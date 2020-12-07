<?php

namespace App\View\Components;

use App\Category;
use Illuminate\View\Component;

class Navbar2 extends Component
{
    public $categories = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories)
    {
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar2');
    }
}
