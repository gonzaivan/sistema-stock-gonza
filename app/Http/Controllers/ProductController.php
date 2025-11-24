<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('variants')->get();
        
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'size' => 'required|max:50',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $product->variants()->create([
            'size' => $request->size,
            'color' => $request->color,
            'material' => $request->material,
            'price' => $request->price,
            'stock' => $request->stock,
            'sku' => $request->sku,
            'stock_alert' => 5, 
        ]);

        return redirect()->route('products.index'); 
    }

    // 3. Mostrar el formulario para agregar UN talle más
    public function createVariant(Product $product)
    {
        return view('products.add-variant', compact('product'));
    }

    public function storeVariant(Request $request, Product $product)
    {
        $request->validate([
            'size' => 'required|max:50',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product->variants()->create([
            'size' => $request->size,
            'color' => $request->color,
            'material' => $request->material,
            'price' => $request->price,
            'stock' => $request->stock,
            'sku' => $request->sku,
            'stock_alert' => 5,
        ]);

        return redirect()->route('products.index');
    }

    public function editVariant(\App\Models\ProductVariant $variant)
    {
        $product = $variant->product; 
        return view('products.edit-variant', compact('variant', 'product'));
    }

    public function updateVariant(Request $request, \App\Models\ProductVariant $variant)
    {
        $request->validate([
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'sku'   => 'nullable|unique:product_variants,sku,' . $variant->id,
        ]);

        $variant->update([
            'size'  => $request->size,
            'color' => $request->color,
            'price' => $request->price,
            'stock' => $request->stock,
            'sku'   => $request->sku,
        ]);

        return redirect()->route('products.index')->with('success', 'Variante actualizada correctamente');
    }
}
