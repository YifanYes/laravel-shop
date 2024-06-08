<?php

namespace App\Http\Actions\Product;

use App\Http\Actions\Action;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Services\{ProductService};
use Exception;

class UpdateProduct extends Action {
  public function __invoke(ProductRequest $request, string $productId, ProductService $service) {
    try {
      return new ProductResource(
        $service->updateProduct(
          $productId,
          $request->validated()
        )
      );
    } catch (Exception $exception) {
      return response()->json([
        'error' => $exception->getMessage(),
        'code' => $exception->getCode(),
      ]);
    }
  }
}
