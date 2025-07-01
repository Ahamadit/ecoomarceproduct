<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(){
        return view('productcreate');
    }

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        // Store the uploaded image
        $imagePath = $request->file('image')->store('products', 'public');

        // Save to database
        Product::create([
            'name' => $request->name,
            'image' => $imagePath,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }


    /// show the data in table
    public function show()
    {
        $products = Product::all();
    return view('index', compact('products'));
    }


    //// edit the in table

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('productedit', compact('product'));
}


/// this is use for update and submit
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->save();

    return redirect()->route('product.index')->with('success', 'Product updated successfully!');
}


//// this code use for delete the data
public function destroy($id)
{
    $product = Product::findOrFail($id);

    // Optional: Delete image file from storage
    if ($product->image && \Storage::disk('public')->exists($product->image)) {
        \Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
}



}
