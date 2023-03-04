<?php

namespace App\Http\Livewire\Admin\Reports\Charts;

use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UsersByGender extends Component
{
    public $result;

    public function mount()
    {
        $this->getUsersByGender();
    }

    public function getUsersByGender()
    {
        $this->result=Profile::select('gender', DB::raw('count(*) as count'))
       ->groupBy('gender')
       ->get()->toArray();
    }
    public function render()
    {
        return view('livewire.admin.reports.charts.users-by-gender');
    }
}
