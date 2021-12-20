<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [ProductController::class, 'index']);

Route::get('/products', [ProductController::class, 'fetchProducts']);
