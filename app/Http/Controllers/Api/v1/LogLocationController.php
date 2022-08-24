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
    public function index()
    {
        $logsLocations = LogLocation::all();
        return response()->json($logsLocations);
    }

    public function store(StoreLogLocationRequest $request)
    {
        $cart_id = $request->input('cart_id');
        $location_id = Cart::where('id', $cart_id)->value('current_location_id');

        $request->merge(['location_id' => $location_id]);
        $logLocation = LogLocation::create($request->all());

        return response()->json([
            'message' => "Log saved successfully.",
            'logLocation' => $logLocation,
        ], 200);
    }

    public function show($id)
    {
        $logLocation = LogLocation::find($id);
        return response()->json($logLocation);
    }

    public function update(UpdateLogLocationRequest $request, LogLocation $logLocation)
    {
        $logLocation->update($request->all());

        return response()->json([
            'message' => "Log updated successfully.",
            'logLocation' => $logLocation
        ], 200);
    }

    public function destroy(LogLocation $logLocation)
    {
        $logLocation->delete();

        return response()->json([
            'message' => "Log deleted successfully."
        ], 200);
    }
}
