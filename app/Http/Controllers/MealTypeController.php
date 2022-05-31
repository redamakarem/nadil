<?php

namespace App\Http\Controllers;

use App\Models\MealType;
use App\Http\Requests\StoreMealTypeRequest;
use App\Http\Requests\UpdateMealTypeRequest;

class MealTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreMealTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMealTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function show(MealType $mealType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function edit(MealType $mealType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMealTypeRequest  $request
     * @param  \App\Models\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMealTypeRequest $request, MealType $mealType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MealType  $mealType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MealType $mealType)
    {
        //
    }
}
