<?php

namespace App\Http\Controllers;

use App\Models\DiningTable;
use App\Http\Requests\StoreDiningTableRequest;
use App\Http\Requests\UpdateDiningTableRequest;

class DiningTableController extends Controller
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
     * @param  \App\Http\Requests\StoreDiningTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiningTableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiningTable  $diningTable
     * @return \Illuminate\Http\Response
     */
    public function show(DiningTable $diningTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiningTable  $diningTable
     * @return \Illuminate\Http\Response
     */
    public function edit(DiningTable $diningTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiningTableRequest  $request
     * @param  \App\Models\DiningTable  $diningTable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiningTableRequest $request, DiningTable $diningTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiningTable  $diningTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiningTable $diningTable)
    {
        //
    }
}
