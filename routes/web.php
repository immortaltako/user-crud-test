<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;




Route::get('/', [UserController::class, 'index'])->name('view_user');

Route::get('/view_user', [UserController::class, 'index'])->name('view_user');

Route::get('/create_user', [UserController::class, 'create'])->name('create_user');;

Route::post('/store_user', [UserController::class, 'store'])->name('store_user');

Route::get('/edit_user/{Users}', [UserController::class, 'edit'])->name('edit_user');

Route::post('/update_user/{id}', [UserController::class, 'update'])->name('update_user');

Route::delete('/delete_user/{id}', [UserController::class, 'destroy'])->name('delete_user');
