<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $products = Product::with('category')->paginate(); // Carga la relación con la categoría
    
        return view('product.index', compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * $products->perPage());
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $product = new Product();
        $categories = Category::all(); // Obtén todas las categorías
    
        return view('product.create', compact('product', 'categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return Redirect::route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $product = Product::with('category')->findOrFail($id); // Carga la relación con la categoría

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $product = Product::findOrFail($id); // Encuentra el producto
        $categories = Category::all(); // Obtén todas las categorías

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return Redirect::route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Product::findOrFail($id)->delete();

        return Redirect::route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
