<?php

use App\Http\Actions\Product;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require_once __DIR__ . '/auth.php';

Route::get('/', function () {
  return Inertia::render('Index');
});

Route::group(['prefix' => 'products'], function () {
  Route::get('/', Product\GetProductsList::class);
  Route::post('/', Product\CreateProduct::class);
  Route::get('/{product_id}', Product\GetProduct::class);
  Route::put('/{product_id}', Product\UpdateProduct::class);
  Route::delete('/{product_id}', Product\DeleteProduct::class);
});
