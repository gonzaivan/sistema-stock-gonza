<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
});


Route::get('/productos/crear', [ProductController::class, 'create'])->name('products.create');

Route::post('/productos', [ProductController::class, 'store'])->name('products.store');

Route::get('/productos', [ProductController::class, 'index'])->name('products.index');

Route::get('/productos/{product}/nueva-variante', [ProductController::class, 'createVariant'])->name('products.createVariant');
Route::post('/productos/{product}/nueva-variante', [ProductController::class, 'storeVariant'])->name('products.storeVariant');

Route::get('/variante/{variant}/editar', [ProductController::class, 'editVariant'])->name('variants.edit');
Route::put('/variante/{variant}', [ProductController::class, 'updateVariant'])->name('variants.update');