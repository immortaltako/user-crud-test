<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Inertia\Inertia;

use App\Models\Product;
use App\Http\Resources\ProductResource;

use App\Http\Traits\ValidatesProducts;

class ProductController extends Controller
{
    use ValidatesProducts;

    // Displays the product listing page with possible search functionality
    public function index(Request $request)
    {
        $isAdmin = auth()->user()->isAdmin();

        $page = $request->input('page', 1);
        $perPage = 10;

        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%");
        }

        $products = $query->with('category')->orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);

        return Inertia::render('Product/Index', [
            'isAdmin' => $isAdmin,
            'products' => $products,
        ]);
    }

    // Returns the product creation view
    public function create(Request $request)
    {
        $page = $request->input('page', 1);

        return Inertia::render('Product/Create', [
            'page' => $page
        ]);
    }

    // Handles product creation with form validation and redirection
    public function store(Request $request)
    {
        $validator = $this->validateProduct($request);

        try {
            $category_id = $request->input('category_id', 1);
            $product = Product::create(array_merge($validator->validated(), ['category_id' => $category_id]));

            return redirect()->route('dashboard.products.index')->banner('Product created successfully.');
        } catch (QueryException $e) {
            return redirect()->route('dashboard.products.index')->dangerBanner('Error adding new product. Please check data entered and try again.');
        }
    }

    // Returns the product edit view
    public function edit(Request $request, Product $product)
    {
        $page = $request->input('page', 1);

        return Inertia::render('Product/Edit', [
            'product' => new ProductResource($product),
            'page' => $page
        ]);
    }

    // Handles product updates with form validation and redirection
    public function update(Request $request, Product $product)
    {
        $validator = $this->validateProduct($request);

        try {
            $product->update($validator->validated());
            $page = $request->input('page', 1);

            return redirect()->route('dashboard.products.index', ['page' => $page])->banner('Product updated successfully.');
        } catch (QueryException $e) {
            return redirect()->route('dashboard.products.index')->dangerBanner('Error updating product. Please check data entered and try again.');
        }
    }

    // Handles product deletion and redirection
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.products.index')->banner('Product deleted successfully.');
    }
}
