<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\StoreCartRequest;
use App\Http\Requests\v1\UpdateCartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::all();
        return response()->json($carts);
    }

    public function store(StoreCartRequest $request)
    {
        $cart = Cart::create($request->all());

        return response()->json([
            'message' => "Cart saved successfully.",
            'cart' => $cart
        ], 200);
    }

    public function show($id)
    {
        $cart = Cart::find($id);
        return response()->json($cart);
    }

    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $cart->update($request->all());

        return response()->json([
            'message' => "Cart updated successfully.",
            'cart' => $cart
        ], 200);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->json([
            'message' => "Cart deleted successfully."
        ], 200);
    }
}
