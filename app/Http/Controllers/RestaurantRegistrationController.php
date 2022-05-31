<?php

namespace App\Http\Controllers;

use App\Models\RestaurantRegistration;
use Illuminate\Http\Request;

class RestaurantRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.restaurant-registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\RestaurantRegistration  $restaurantRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantRegistration $restaurantRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestaurantRegistration  $restaurantRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantRegistration $restaurantRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantRegistration  $restaurantRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantRegistration $restaurantRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestaurantRegistration  $restaurantRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantRegistration $restaurantRegistration)
    {
        //
    }
}
