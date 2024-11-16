<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products_data = Product::all();
        return view('products.index', ['products' => $products_data]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $new_product = Product::create($data);

        return redirect(route('products.index'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }
    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('products.index'))->with("success", "Producted updated Succesfully!");
    }
    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'))->with("success", "Producted Deleted Succesfully!");
    }
}
