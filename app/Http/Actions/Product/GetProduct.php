<?php

namespace App\Http\Actions\Product;

use App\Http\Actions\Action;
use App\Http\Resources\ProductResource;
use App\Http\Services\{ProductService};
use Exception;

class GetProduct extends Action {
  public function __invoke(string $productId, ProductService $service) {
    try {
      return new ProductResource($service->getProduct($productId));
    } catch (Exception $exception) {
      return response()->json([
        'error' => $exception->getMessage(),
        'code' => $exception->getCode(),
      ]);
    }
  }
}
