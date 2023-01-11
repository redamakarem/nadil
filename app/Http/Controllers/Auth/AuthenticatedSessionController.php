<?php

namespace App\Http\Controllers\Auth;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $agent = new Agent();
        if ($agent->isMobile()){
            return view('auth.mobile.login');
        }else{
            return view('auth.login');
        }
            
        
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        if(auth()->user()->hasRole('admin')){
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        }
        if(auth()->user()->hasRole(['restaurant-admin','restaurant-super-admin','restaurant-host','restaurant-manager'])){
            return redirect()->intended(RouteServiceProvider::RESTAURANT_HOME);
        }
        return redirect()->intended(RouteServiceProvider::HOME);


    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
