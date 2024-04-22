<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Authenticated routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'user' => request()->user()
        ]);
    })->name('dashboard');

    // Product routes
    Route::prefix('dashboard/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('dashboard.products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('dashboard.products.create');
        Route::post('/', [ProductController::class, 'store'])->name('dashboard.products.store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('dashboard.products.show');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('dashboard.products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('dashboard.products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('dashboard.products.destroy');
    });
});

