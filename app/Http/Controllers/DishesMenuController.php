<?php

namespace App\Http\Controllers;

use App\Models\DishesMenu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishesMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($restaurant)
    {
        $rest = Restaurant::with('menus')->findOrFail($restaurant);
        return view('admin.dishes-menu.index',['restaurant' => $rest]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurant)
    {
        $rest = Restaurant::findOrFail($restaurant);
        if (!$rest){
            abort(404,'Restaurant not found');
        }
        return view('admin.dishes-menu.create',['restaurant' =>$rest]);
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
     * @param  \App\Models\DishesMenu  $dishesMenu
     * @return \Illuminate\Http\Response
     */
    public function show($restaurant,$menu)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DishesMenu  $dishesMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($restaurant, $id)
    {
        $rest = Restaurant::with('menus')->findOrFail($restaurant);
        $menu = DishesMenu::findOrFail($id);
        return view('admin.dishes-menu.edit',['restaurant' => $rest, 'menu' =>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DishesMenu  $dishesMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DishesMenu $dishesMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DishesMenu  $dishesMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(DishesMenu $dishesMenu)
    {
        //
    }
}
