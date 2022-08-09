<?php

namespace App\Http\Livewire\Components;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{

    public  Model $model;
    public  string $field;
    public bool $is_checked;

    public function mount()
    {
        $this->is_checked = (bool) $this->model->getAttribute($this->field);
    }

    public function render()
    {
        return view('livewire.components.toggle-button');
    }


    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }

    private function validate_restaurant(Restaurant $restaurant)
    {
        
    }
}
