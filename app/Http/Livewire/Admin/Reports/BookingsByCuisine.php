<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\Cuisine;
use Livewire\Component;
use App\Models\Restaurant;

class BookingsByCuisine extends Component
{
    public function mount()
    {
        dd($this->perform_query());
        // $this->perform_query();
    }

    private function perform_query()
    {
        $result = collect();
        $obj = [];

        $cuisines = Cuisine::all();
        $cuisines->map(function (Cuisine $cuisine)use($result) {
            
            $obj['name'] = $cuisine->name_en;
            $cuisine->restaurants->map(function (Restaurant $restaurant)use($obj) {
                // dd($restaurant->bookings->count());
                $obj['bookings'] = $restaurant->bookings->count();
            });
            $result->push($obj);
        });
        return $result->all();
    }
    public function render()
    {
        return view('livewire.admin.reports.bookings-by-cuisine');
    }
}
