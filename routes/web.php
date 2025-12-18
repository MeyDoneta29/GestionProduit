<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/produits', [ProductController::class, 'index'])->name('products.index');
    Route::delete('/produits/{id}', [ProductController::class, 'delete'])->name('products.delete');
