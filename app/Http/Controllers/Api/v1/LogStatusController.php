<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\StoreLogStatusRequest;
use App\Http\Requests\v1\UpdateLogStatusRequest;
use App\Models\Cart;
use App\Models\LogStatus;
use Illuminate\Http\Request;

class LogStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logsStatuses = LogStatus::all();

        return response()->json([
            'logsStatuses' => $logsStatuses
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
    public function store(StoreLogStatusRequest $request)
    {
        $cart_id = $request->input('cart_id');
        $carts = Cart::where('id', $cart_id)->select('status')->get();

        $status = "";
        foreach ($carts as $cart) {
            $status = $cart->status;
        }

        $request->merge(['status' => $status]);
        $logStatus = LogStatus::create($request->all());

        return response()->json([
            'message' => "Log saved successfully.",
            'logStatus' => $logStatus
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogStatus  $logStatus
     * @return \Illuminate\Http\Response
     */
    public function show(LogStatus $logStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogStatus  $logStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(LogStatus $logStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogStatus  $logStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLogStatusRequest $request, LogStatus $logStatus)
    {
        $logStatus->update($request->all());

        return response()->json([
            'message' => "Log updated successfully.",
            'logStatus' => $logStatus
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogStatus  $logStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogStatus $logStatus)
    {
        $logStatus->delete();

        return response()->json([
            'message' => "Log deleted successfully."
        ], 200);
    }
}
