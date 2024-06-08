<?php

use App\Http\Actions\Product;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require_once __DIR__ . '/auth.php';

Route::get('/', function () {
  return Inertia::render('Welcome', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
  ]);
});

Route::get('/dashboard', function () {
  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'products'], function () {
  Route::get('/', Product\GetProductsList::class);
  Route::post('/', Product\CreateProduct::class);
  Route::get('/{product_id}', Product\GetProduct::class);
  Route::put('/{product_id}', Product\UpdateProduct::class);
  Route::delete('/{product_id}', Product\DeleteProduct::class);
});
