<?php

namespace Pterodactyl\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Pterodactyl\Http\Controllers\Controller;
use Pterodactyl\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of products in the admin panel.
     */
    public function index()
    {
        $products = Product::query()
            ->when(request('filter.*'), function ($query) {
                $query->where('name', 'like', '%' . request('filter.*') . '%');
            })
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.products.new');
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'nest_id' => 'required|integer',
        ]);

        $product = Product::create($validated);

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    /**
     * View the details of a specific product.
     */
    public function view(Product $product)
    {
        $product->load('options'); // Eager load options
        $options = $product->options()->paginate(10); // Paginate options
        return view('admin.products.view.index', compact('product'));
    }

    /**
     * Show the form for editing a product.
     */
    public function edit(Product $product)
    {
        // Load the product with its options for editing
        $product->load('options');
        return view('admin.products.view.edit', compact('product'));
    }
    
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'nest_id' => 'required|integer',
            'options' => 'required|array',
            'options.*.id' => 'nullable|integer', // Existing option ID, if applicable
            'options.*.memory' => 'required|integer|min:0',
            'options.*.cpu_limit' => 'required|integer|min:0',
            'options.*.allocation_limit' => 'required|integer|min:0',
            'options.*.database_limit' => 'required|integer|min:0',
            'options.*.backup_limit' => 'required|integer|min:0',
            'options.*.storage' => 'required|integer|min:0',
            'options.*.egg_id' => 'required|integer',
            'options.*.price' => 'required|integer|min:0',
        ]);

        // Update the product details
        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'nest_id' => $validated['nest_id'],
        ]);

        // Handle product options
        foreach ($validated['options'] as $option) {
            if (isset($option['id'])) {
                // Update existing option
                $product->options()->where('id', $option['id'])->update($option);
            } else {
                // Create new option
                $product->options()->create($option);
            }
        }

        return redirect()->route('admin.products.view', $product->id)->with('success', 'Product updated successfully.');
    }


    /**
     * Remove a product from the database.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
}
