<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/view_all', [UserController::class, 'jsonapi'])->name('view_all');

Route::get('/view_one/{id}', [UserController::class, 'show'])->name('view_one');