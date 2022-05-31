<?php

namespace App\Http\Controllers;

use App\Models\SiteContact;
use App\Http\Requests\StoreSiteContactRequest;
use App\Http\Requests\UpdateSiteContactRequest;

class SiteContactController extends Controller
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
     * @param  \App\Http\Requests\StoreSiteContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiteContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteContact  $siteContact
     * @return \Illuminate\Http\Response
     */
    public function show(SiteContact $siteContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteContact  $siteContact
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteContact $siteContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiteContactRequest  $request
     * @param  \App\Models\SiteContact  $siteContact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiteContactRequest $request, SiteContact $siteContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteContact  $siteContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteContact $siteContact)
    {
        //
    }
}
