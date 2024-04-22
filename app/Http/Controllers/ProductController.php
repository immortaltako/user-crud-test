<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // Displays the product listing page with possible search functionality
    public function index(Request $request)
    {
        $user = auth()->user();
        $isAdmin = $user->roles->contains('name', 'admin');
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

    // Handles product creation with form validation and redirection
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'category_id' => 'nullable|integer|exists:categories,id',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
            'units_sold' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return Inertia::render('Product/Create', [
                'errors' => $validator->errors(),
            ])->withInput($request->input());
        }

        try {
            $category_id = $request->input('category_id', 1);
            $product = Product::create(array_merge($validator->validated(), ['category_id' => $category_id]));

            return redirect()->route('dashboard.products.index')->banner('Product created successfully.');
        } catch (QueryException $e) {
            return redirect()->route('dashboard.products.index')->dangerBanner('Error adding new product. Please check data entered and try again.');
        }
    }

    // Returns the product creation view
    public function create(Request $request)
    {
        $page = $request->input('page', 1);

        return Inertia::render('Product/Create', [
            'page' => $page
        ]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'category_id' => 'nullable|integer|exists:categories,id',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
            'units_sold' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return Inertia::render('Product/Edit', [
                'errors' => $validator->errors(),
                'product' => new ProductResource($product),
                'page' => $request->input('page', 1)
            ])->withInput($request->input());
        }

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
        try {
            $product->delete();

            return redirect()->route('dashboard.products.index')->banner('Product deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->route('dashboard.products.index')->dangerBanner('Error deleting product. Please check data entered and try again.');
        }
    }
}
