<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = new Products();
        $product->name = $request->name;
        $price = str_replace(',', '.', $request->price);
        $product->price = $price;
        $product->description = $request->description ?? '0';
        $product->category_id = $request->category_id;
        $product->stock = $request->stock ?? '0';

        $this->checkImage($request, $product);

        $product->save();
        return redirect()->route('admin.productcategories.show', $request->category_id)->with('success',
            'Nieuwe product opgeslagen');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Products::where('id', $id)->first();
        $backRoute = route('admin.productcategories.show', $product->category_id);

        return view('admin.products.show',
            compact('product',
            'backRoute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = Products::where('id', $id)->first();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $price = str_replace(',', '.', $request->price);
        $product->price = $price;

        $this->checkImage($request, $product);

        $product->save();

        return redirect()->route('admin.products.show', $id)->with('success', 'Product aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Products::where('id', $id)->first();
        Products::destroy($id);

        return redirect()->route('admin.productcategories.show', $product->category_id)
            ->with('success', 'Product verwijderd');
    }

    public function checkImage($request, $product)
    {
        if($request->file('image'))
        {
            $imageName = 'category-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('img/product/', $imageName);
            $product->image = $imageName ?? '0';
        }
    }
}
