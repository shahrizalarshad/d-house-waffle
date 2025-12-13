<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('seller.product-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        Product::create([
            'apartment_id' => auth()->user()->apartment_id,
            'seller_id' => auth()->id(),
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return redirect()->route('seller.products')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::where('seller_id', auth()->id())->findOrFail($id);
        return view('seller.product-edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('seller_id', auth()->id())->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        $product->update($validated);

        return redirect()->route('seller.products')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::where('seller_id', auth()->id())->findOrFail($id);
        $product->delete();

        return back()->with('success', 'Product deleted successfully');
    }

    public function toggleStatus($id)
    {
        $product = Product::where('seller_id', auth()->id())->findOrFail($id);
        $product->update(['is_active' => !$product->is_active]);

        return back()->with('success', 'Product status updated');
    }
}
