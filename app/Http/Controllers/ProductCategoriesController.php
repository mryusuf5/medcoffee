<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = ProductCategories::all();
        $title = 'Product categorieën';
        $modalId = 'newCategory';
        $modalTitle = 'Nieuwe product categorie';
        $modalBody = 'Nieuwe product categorie';
        $formRoute = route('admin.productcategories.store');

        return view('admin.productcategories.index',
            compact('title',
                'modalId',
                'modalTitle',
                'modalBody',
                'categories',
                'formRoute'));
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
            'name' => 'required'
        ]);

        $productCategory = new ProductCategories();
        $productCategory->name = $request->name;

        if($request->file('image'))
        {
            $imageName = 'category-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('img/category/', $imageName);
            $productCategory->image = $imageName;
        }

        $productCategory->save();

        return redirect()->route('admin.productcategories.index')->with('success', 'Category opgeslagen');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $category = ProductCategories::where('id', $id)->first();
        $products = Products::sortable()->where('category_id', $id)->get();
        $modalId = 'newProduct';
        $modalTitle = 'Nieuwe product';
        $modalBody = 'Nieuwe product';
        $formRoute = route('admin.products.store');
        $backRoute = route('admin.productcategories.index');

        return view('admin.productcategories.show',
            compact('category',
                'products',
            'modalId',
            'modalBody',
            'modalTitle',
            'formRoute',
            'backRoute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategories $productCategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = ProductCategories::where('id', $id)->first();

        $category->name = $request->name;

        $this->checkImage($request, $category);

        $category->save();

        return redirect()->route('admin.productcategories.show', $id)->with('success', 'Categorie aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ProductCategories::destroy($id);

        return redirect()->route('admin.productcategories.index')->with('success', 'Categorie verwijderd');
    }

    public function checkImage($request, $productCategory)
    {
        if($request->file('image'))
        {
            $imageName = 'category-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('img/category/', $imageName);
            $productCategory->image = $imageName;
        }
    }

    public function userShowCategory($id)
    {
        $products = Products::where('category_id', $id)->get();
        $categories = ProductCategories::all();

        return view('user.products.index', compact('products', 'categories'));
//        return json_encode(['items' => $products]);
    }
}
