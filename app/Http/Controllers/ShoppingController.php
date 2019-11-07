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
    public function addToCart(Request $request)
    {

        $product = Product::findOrFail($request->p_id);

        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->price,
        ]);

        dd(Cart::content());
    }
}
