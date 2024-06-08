<?php

namespace App\Http\Services;

use App\DTO\ProductRequestDTO;
use App\Models\{Category, Product};
use Exception;

class ProductService {
  public function createProduct(ProductRequestDTO $data): Product {
    $product = Product::create([
      'name' => $data->name,
      'price' => $data->price,
      'currency' => $data->currency,
      'description' => $data->description,
      'image_url' => $data->imageUrl,
      'cta_url' => $data->ctaUrl,
    ]);

    if ($data->categories) {
      foreach ($data->categories as $category) {
        $category = Category::firstWhere('name', $category);
        if(!$category) {
          throw new Exception('Category not found', 404);
        }
        $product->categories()->sync($category->id);
      }
    }

    $product->refresh();
    return $product;
  }
}
