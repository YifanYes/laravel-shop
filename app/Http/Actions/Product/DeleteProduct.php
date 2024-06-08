<?php

namespace App\Http\Actions\Product;

use App\Http\Actions\Action;
use App\Http\Services\{ProductService};
use Exception;

class DeleteProduct extends Action {
  public function __invoke(string $productId, ProductService $service) {
    try {
      $service->deleteProduct($productId);

      return response()->json([
        'data' => null
      ]);
    } catch (Exception $exception) {
      return response()->json([
        'error' => $exception->getMessage(),
        'code' => $exception->getCode(),
      ]);
    }
  }
}
