<?php

namespace App\Http\Actions\Product;

use App\Http\Actions\Action;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Services\{ProductService};

class CreateProduct extends Action {
  public function __invoke(ProductRequest $request, ProductService $service) {
    return new ProductResource($service->createProduct($request->validated()));
  }
}
