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
    public function index()
    {
        $logsStatuses = LogStatus::all();

        return response()->json([
            'logsStatuses' => $logsStatuses
        ]);
    }

    public function store(StoreLogStatusRequest $request)
    {
        $cart_id = $request->input('cart_id');
        $cart = Cart::where('id', $cart_id)->select('status')->get()->first();

        $status = $cart["status"];

        $request->merge(['status' => $status]);
        $logStatus = LogStatus::create($request->all());

        return response()->json([
            'message' => "Log saved successfully.",
            'logStatus' => $logStatus
        ], 200);
    }

    public function update(UpdateLogStatusRequest $request, LogStatus $logStatus)
    {
        $logStatus->update($request->all());

        return response()->json([
            'message' => "Log updated successfully.",
            'logStatus' => $logStatus
        ], 200);
    }

    public function destroy(LogStatus $logStatus)
    {
        $logStatus->delete();

        return response()->json([
            'message' => "Log deleted successfully."
        ], 200);
    }
}
