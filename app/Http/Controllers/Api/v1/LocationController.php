<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\StoreLocationRequest;
use App\Http\Requests\v1\UpdateLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return response()->json($locations);
    }

    public function store(StoreLocationRequest $request)
    {
        $location = Location::create($request->all());

        return response()->json([
            'message' => "Location saved successfully.",
            'location' => $location
        ], 200);
    }

    public function show($id)
    {
        $location = Location::find($id);
        return response()->json($location);
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->all());

        return response()->json([
            'message' => "Location updated successfully",
            'location' => $location
        ], 200);
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return response()->json([
            'message' => "Location deleted successfully."
        ], 200);
    }
}
