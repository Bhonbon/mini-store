<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $products = DB::table('products')->simplePaginate(8);

        return view('category.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Product();

        $products->product = $request->input('product');
        $products->price = $request->input('price');
        $products->type = $request->input('type');

        // // Handle image upload
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '.' . $image->getClientOriginalName();
        //     $image->storeAs('public/product_images', $filename);
        //     $products->image = $filename;
        // }

        $products->save();


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return view('category.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $request->validate([
            'product' => 'required|max:255',
            'price' => 'required',
            'type' => 'required',
        ]);

        $products->update($request->all());
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back();
    }
}
