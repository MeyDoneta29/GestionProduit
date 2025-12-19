<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');
