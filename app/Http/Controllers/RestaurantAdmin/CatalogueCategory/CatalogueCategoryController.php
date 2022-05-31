<?php

namespace App\Http\Controllers\RestaurantAdmin\CatalogueCategory;

use App\Http\Controllers\Controller;
use App\Models\DishesMenu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CatalogueCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Restaurant $restaurant
     * @param DishesMenu $menu
     * @return void
     */
    public function index(Restaurant $restaurant,DishesMenu $menu)
    {
        if ($restaurant->owner->id==auth()->id())
        {
            return view('restaurant-admin.catalogue-category.index',
                ['restaurant' =>$restaurant,'catalogue' =>$menu]);
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
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant,DishesMenu $menu)
    {

        if ($restaurant->owner->id==auth()->id())
        {
            return view('restaurant-admin.catalogue-category.create', ['restaurant' =>$restaurant,'catalogue' =>$menu]);
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
    public function edit($id)
    {
        //
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
