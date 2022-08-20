<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\StoreLogLocationRequest;
use App\Http\Requests\v1\UpdateLogLocationRequest;
use App\Models\Cart;
use App\Models\LogLocation;
use Illuminate\Http\Request;

class LogLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logsLocations = LogLocation::all();

        return response()->json([
            'logsLocations' => $logsLocations
        ]);
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
    public function store(StoreLogLocationRequest $request)
    {
        $cart_id = $request->input('cart_id');
        $carts = Cart::where('id', $cart_id)->select('current_location_id')->get();

        $location_id = "";
        foreach ($carts as $cart) {
            $location_id = $cart->current_location_id;
        }

        $request->merge(['location_id' => $location_id]);
        $logLocation = LogLocation::create($request->all());

        return response()->json([
            'message' => "Log saved successfully.",
            'logLocation' => $logLocation,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogLocation  $logLocation
     * @return \Illuminate\Http\Response
     */
    public function show(LogLocation $logLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogLocation  $logLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(LogLocation $logLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogLocation  $logLocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLogLocationRequest $request, LogLocation $logLocation)
    {
        $logLocation->update($request->all());

        return response()->json([
            'message' => "Log updated successfully.",
            'logLocation' => $logLocation
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogLocation  $logLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogLocation $logLocation)
    {
        $logLocation->delete();

        return response()->json([
            'message' => "Log deleted successfully."
        ], 200);
    }
}
