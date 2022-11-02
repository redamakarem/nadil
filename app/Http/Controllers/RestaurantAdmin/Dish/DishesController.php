<?php

namespace App\Http\Controllers\RestaurantAdmin\Dish;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\DishesCategory;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Restaurant $restaurant
     * @param DishesMenu $menu
     * @param DishesCategory $category
     * @return void
     */
    public function index(Restaurant $restaurant,DishesMenu $menu,DishesCategory $category)
    {
        if ($restaurant->owner->id==auth()->id()){
            $category->load(['dishes']);
            return view('restaurant-admin.dish.index',
                ['restaurant' =>$restaurant, 'catalogue' =>$menu, 'category' =>$category]);
        }
        else{
            abort(403);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Restaurant $restaurant
     * @param DishesMenu $menu
     * @param DishesCategory $category
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant,DishesMenu $menu,DishesCategory $category)
    {
        if ($restaurant->owner->id==auth()->id())
        {
            return view('restaurant-admin.dish.create',
                ['restaurant' => $restaurant, 'catalogue' => $menu, 'category' => $category]);
        }
        else{
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant,DishesMenu $menu,DishesCategory $category, Dish $dish)
    {
        if ($restaurant->owner->id==auth()->id())
        {
            return view('restaurant-admin.dish.edit',
                ['restaurant' => $restaurant, 'catalogue' => $menu, 'category' => $category, 'dish' => $dish]);
        }
        else{
            abort(403);
        }
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function new_dish()
    {
        return view('restaurant-admin.dish.create-new')
    }
}
