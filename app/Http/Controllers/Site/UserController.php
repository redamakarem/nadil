<?php

namespace App\Http\Controllers\Site;

use App\Models\Booking;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookingsTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
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
    public function profile()
    {
        $agent = new Agent();
        $profile = Auth::user()->profile;
        if ($agent->isDesktop()){
            return view('site.user.profile', compact('profile'));
        }
        else{
            return view('site.mobile.user-profile',compact('profile'));
        }
    }

    public function profile_edit()
    {
        $profile = Auth::user()->profile;
        return view('site.user.profile-edit', compact('profile'));
    }

    public function history()
    {
        $agent = new Agent();
        $profile = Auth::user()->profile->firstOrFail();
        $bookings = Booking::with('restaurant')->where('user_id',Auth::id())->orderBy('booking_date','desc')->where('booking_status_id','1')->get();
        if ($agent->isDesktop()) {
        return view('site.user.history',compact(['bookings','profile']));
        }
        else{
            return view('site.mobile.user-history',compact(['bookings','profile']));
        }
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

    public function cancel_booking(Request $request)
    {
        $validated_data = $request->validate(
            [
                'booking-id' => ['required','exists:bookings,id']
                
             ]
        );
        $booking = Booking::findOrFail($validated_data['booking-id']);
        if($booking){
            BookingsTables::where('booking_date',$booking->booking_date)
            ->where('booking_time',$booking->booking_time)->delete();
            $booking->booking_status_id=5;
            $booking->save();
        }
    }
}
