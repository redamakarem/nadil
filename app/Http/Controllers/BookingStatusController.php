<?php

namespace App\Http\Controllers;

use App\Models\BookingStatus;
use App\Http\Requests\StoreBookingStatusRequest;
use App\Http\Requests\UpdateBookingStatusRequest;

class BookingStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreBookingStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\Response
     */
    public function show(BookingStatus $bookingStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingStatus $bookingStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingStatusRequest  $request
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingStatusRequest $request, BookingStatus $bookingStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingStatus $bookingStatus)
    {
        //
    }
}
