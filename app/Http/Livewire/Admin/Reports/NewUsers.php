<?php

namespace App\Http\Livewire\Admin\Reports;

use Carbon\Carbon;
use App\Models\Profile;
use Livewire\Component;

class NewUsers extends Component
{

    public $date_filter;
    public $new_users;


    public function mount()
    {
        $this->perform_query('today');
    }

    public function perform_query($filter)
    {
        $query = Profile::query();
        switch($filter){
            case 'today':
                $query->whereDate('created_at',Carbon::today());
                break;
            case 'yesterday':
                $query->wheredate('created_at',Carbon::yesterday());
                break;
            case 'this_week':
                $query->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()]);
                break;
            case 'last_week':
                $query->whereBetween('created_at',[Carbon::now()->subWeek(),Carbon::now()]);
                break;
            case 'this_month':
                $query->whereMonth('created_at',Carbon::now()->month);
                break;
            case 'last_month':
                $query->whereMonth('created_at',Carbon::now()->subMonth()->month);
                break;
            case 'this_year':
                $query->whereYear('created_at',Carbon::now()->year);
                break;
            case 'last_year':
                $query->whereYear('created_at',Carbon::now()->subYear()->year);
                break;                       
        }

        $this->new_users = $query->get();
        return $this->new_users->count();
    }

    public function updatedDateFilter($value)
    {
        $this->perform_query($this->date_filter);
    }

    public function render()
    {
        return view('livewire.admin.reports.new-users');
    }
}
