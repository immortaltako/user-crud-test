<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // Displays the product listing page with possible search functionality
    public function index(Request $request)
    {
        $user = auth()->user();
        $isAdmin = $user->isAdmin;

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
    public function store(ProductFormRequest $request)
    {
        $product = Product::create($request->validated());

        return redirect()->route('dashboard.products.index')->banner('Product created successfully.');
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
    public function update(ProductFormRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('dashboard.products.index', ['page' => $request->input('page', 1)])->banner('Product updated successfully.');
    }

    // Handles product deletion and redirection
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.products.index')->banner('Product deleted successfully.');
    }
}
