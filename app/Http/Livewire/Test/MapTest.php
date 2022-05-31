<?php

namespace App\Http\Livewire\Test;

use Livewire\Component;

class MapTest extends Component
{
    public string $latLng;
    public function render()
    {
        return view('livewire.test.map-test');
    }

    public function mount()
    {
        $this->latLng= 'test';
    }

    public function save()
    {
        dd($this->latLng);
    }
}
