<?php

namespace App\Http\Livewire\Admin\Reports\Charts;

use App\Models\Profile;
use Livewire\Component;

class UsersByAge extends Component
{
    public $users;
    public $selected_range = '';
    public $age_options = ["16-20","21-30","31-40","41-50"];

    public function mount()
    {
        
        $this->getUserCountByAge();
    }
    public function render()
    {
        return view('livewire.admin.reports.charts.users-by-age');
    }

    

    public function perform_query($age_range)
    {
        return Profile::all()->whereBetween('age',[$age_range[0],$age_range[1]])->count();
    }

    public function getUserCountByAge()
    {
        $this->users = collect();
        foreach($this->age_options as $option){
            $age_range = explode('-',$option);
            $this->users->push($this->perform_query($age_range));
        }
        $this->users = $this->users->toArray();
    }
}
