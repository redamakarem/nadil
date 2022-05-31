<?php

namespace App\Http\Controllers\RestaurantAdmin\Catalogue;

use App\Http\Controllers\Controller;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($restaurant)
    {
        $rest = Restaurant::with(['menus','owner'])->findOrFail($restaurant);
        if (auth()->id()==$rest->owner->id) {
            return view('restaurant-admin.catalogue.index', ['restaurant' => $rest]);
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurant)
    {
        $rest = Restaurant::findOrFail($restaurant);
        return view('restaurant-admin.catalogue.create',['restaurant' =>$rest]);
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
    public function edit($restaurant, $menu)
    {
        $restaurant = Restaurant::with('menus')->findOrFail($restaurant);
        $menuu = DishesMenu::findOrFail($menu);
        return view('restaurant-admin.catalogue.edit',['restaurant' =>$restaurant,'menu' =>$menuu]);
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
}
