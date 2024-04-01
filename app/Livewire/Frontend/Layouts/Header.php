<?php

namespace App\Livewire\Frontend\Layouts;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $data['categories'] = Category::all();
        return view('livewire.frontend.layouts.header',$data);
    }
}
