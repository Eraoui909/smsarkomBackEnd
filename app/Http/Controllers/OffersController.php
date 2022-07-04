<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffersRequest;
use App\Http\Resources\OffersResource;
use Illuminate\Http\Request;
use App\Models\Offer;

class OffersController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return OffersResource
     */
    public function store(OffersRequest $request)
    {
        $offer = Offer::create([
            "title"         => $request->title,
            "description"   => $request->description,
            "country"       => $request->country,
            "city"          => $request->city,
            "location"      => $request->location,
            "type"          => $request->type,
            "category"      => $request->category,
            "details"       => $request->details,
            "price"         => $request->price,
            "builtIn"       => $request->builtIn,
            "garage"        => $request->garage,
            "area"          => $request->area,
            "agentFees"     => $request->agentFees
        ]);

        return new OffersResource($offer);
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
