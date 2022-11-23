<?php

namespace App\Http\Controllers;

use App\Models\DishesCategory;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($restaurant_id,$menu_id)
    {
        $categories = DishesCategory::where('catalogue_id',$menu_id)->get();
        return view('admin.dishes-categories.index', compact('categories','restaurant_id','menu_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurant,$menu)
    {
        $menu = DishesMenu::findOrfail($menu);
        $restaurant = Restaurant::findOrfail($restaurant);
        
        return view('admin.dishes-categories.create', ['restaurant' =>$restaurant, 'menu' =>$menu]);
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
     * @param  \App\Models\DishesCategory  $dishesCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DishesCategory $dishesCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DishesCategory  $dishesCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DishesCategory $dishesCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DishesCategory  $dishesCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DishesCategory $dishesCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DishesCategory  $dishesCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DishesCategory $dishesCategory)
    {
        //
    }
}
