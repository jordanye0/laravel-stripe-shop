<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index() 
    {
        $products = DB::table('products')->paginate(3);
        return view('index', ['products' => $products ]);
    }

    public function show($id)
    {
        return view('show', [
            'product' => Product::findOrFail($id),
        ]);
    }
}
