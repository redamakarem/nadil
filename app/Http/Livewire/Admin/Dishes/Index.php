<?php

namespace App\Http\Livewire\Admin\Dishes;

use Livewire\Component;

class Index extends Component
{

    public $dishes;

    public function render()
    {
        return view('livewire.admin.dishes.index');
    }
}
