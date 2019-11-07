<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $request->validated();

        $product = new Product;

        $product_image = $request->image;
        $product_image_new_name = time() . $product_image->getClientOriginalName();
        $product_image->move('uploads/products', $product_image_new_name);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = 'uploads/products' . $product_image_new_name;

        $product->save();

        $request->session()->flash('success', 'Product was created!');

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.show', [
            'product' => Product::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        $request->validated();

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $product_image = $request->image;
            $product_image_new_name = time() . $product_image->getClientOriginalName();
            $product_image->move('uploads/products', $product_image_new_name);

            $product->image = 'uploads/products' . $product_image_new_name;

            $product->save();
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        $request->session()->flash('success', 'Product was updated!');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if (file_exists($product->image)) {
            unlink($product->image);
        }

        $product->delete();

        $request->session()->flash('success', 'Product was deleted!');

        return redirect()->route('products.index');
    }
}
