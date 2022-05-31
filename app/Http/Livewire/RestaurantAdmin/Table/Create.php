<?php

namespace App\Http\Livewire\RestaurantAdmin\Table;

use App\Models\DiningTable;
use App\Models\Restaurant;
use Illuminate\Support\Collection;
use Livewire\Component;

class Create extends Component
{


    public $restaurant;
    public Collection $inputs;

    protected $rules = [
        'inputs.*.name' => 'required',
        'inputs.*.capacity' => 'required',
    ];


    protected $messages = [
        'inputs.*.name.required' => 'This name field is required.',
        'inputs.*.capacity.required' => 'This capacity field is required.',
    ];



    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;

        $this->fill([
            'inputs' => collect([
                ['name' => '', 'capacity' => 0]
            ]),
        ]);
    }





    public function add()
    {
        $this->inputs->push(['name' => '', 'capacity => 0']);
    }

    public function save()
    {
        $this->validate();
        foreach($this->inputs as $input){
            $this->restaurant->diningTables()->create([
                'name' => $input['name'],
                'capacity' => $input['capacity'],
            ]);
        }

        $this->resetFields();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Cuisine created Successfully!!"
        ]);
    }

    public function remove($key)
    {
        $this->inputs->pull($key);
    }

    public function resetFields()
    {
        $this->fill([
            'inputs' => collect([
                ['name' => '', 'capacity' => 0]
            ]),
        ]);
    }


    public function render()
    {
        return view('livewire.restaurant-admin.table.create');
    }
}
