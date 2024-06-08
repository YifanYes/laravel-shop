<?php

namespace App\Http\Services;

use App\DTO\ProductRequestDTO;
use App\Models\{Category, Product};
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService {
  private function syncCategories(Product $product, array $categories) {
    foreach ($categories as $category) {
      $category = Category::firstWhere('name', $category);
      if(!$category) {
        throw new Exception('Category not found', 404);
      }
      $product->categories()->sync($category->id);
    }
  }

  public function getProductsList(object $pagination): LengthAwarePaginator {
    return Product::with('categories')->paginate($pagination->per_page ?? 20);
  }

  public function getProduct(string $productId): Product {
    $product = Product::findByUuid($productId);
    if (!$product) {
      throw new Exception('Product not found', 404);
    }

    return $product;
  }

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
      $this->syncCategories($product, $data->categories);
    }

    $product->refresh();
    return $product;
  }

  public function updateProduct(string $productId, ProductRequestDTO $data): Product {
    $product = $this->getProduct($productId);

    $product->update([
      'name' => $data->name,
      'price' => $data->price,
      'currency' => $data->currency,
      'description' => $data->description,
      'image_url' => $data->imageUrl,
      'cta_url' => $data->ctaUrl,
    ]);

    if ($data->categories) {
      $this->syncCategories($product, $data->categories);
    }

    $product->refresh();
    return $product;
  }

  public function deleteProduct(string $productId): void {
    $product = $this->getProduct($productId);
    $product->delete();
  }
}
