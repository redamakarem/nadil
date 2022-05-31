<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $restaurants = Restaurant::with('owner','menus','menus.categories')->get();
        $breadcrumbs = [
            'Home' => route('admin.index'),
            'Restaurants' =>route('admin.restaurants.index')
        ];
        return view('admin.restaurants.index', [
            'restaurants' => $restaurants,
            'title' => 'Restaurants',
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cuisines = Cuisine::all();
        $users = User::role('restaurant-admin')->get();
        return view('admin.restaurants.create',compact('cuisines','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $validated_data = $request->validated();
        $new_restaurant = Restaurant::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'address' => $validated_data['address'],
            'coordinates' => $validated_data['coordinates'],
            'phone' => $validated_data['phone'],
            'user_id' => $validated_data['user_id'],
            'image' => 'usquyu.jpg',
        ]);
        $new_restaurant->cuisines()->attach($validated_data['cuisines']);

        return redirect(route('admin.restaurants.index'))->with(['info' =>'Restaurant created successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        $cuisines = Cuisine::all();
        return view('admin.restaurants.edit', compact(['restaurant','cuisines']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(RestaurantRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
