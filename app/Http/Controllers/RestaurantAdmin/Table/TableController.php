<?php

namespace App\Http\Controllers\RestaurantAdmin\Table;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index($restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);
        
        return view('restaurant-admin.dining-tables.index',compact('restaurant'));
    }
    public function create($restaurant)
    {
        $restaurant = Restaurant::findOrFail($restaurant);
        
        return view('restaurant-admin.dining-tables.create',compact('restaurant'));
    }
}
