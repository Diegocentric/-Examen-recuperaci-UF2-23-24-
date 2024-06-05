<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('products.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('products.edit', compact('product', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
