<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        return view('cart');
    }

    public function addToCart(Request $request)
    {

        $product = Product::findOrFail($request->p_id);

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->price,
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->route('cart');
    }

    public function increment($id, $qty)
    {
        Cart::update($id, $qty + 1);

        return redirect()->back();
    }

    public function decrement($id, $qty)
    {
        Cart::update($id, $qty - 1);

        return redirect()->back();
    }

    public function deleteFromCart(Request $request, $id)
    {
        Cart::remove($id);

        return redirect()->back();
    }
}
