<?php

namespace App\Http\Actions\Product;

use App\Http\Actions\Action;
use App\Http\Requests\Request;
use App\Http\Resources\ProductResource;
use App\Http\Services\{ProductService};
use Exception;

class GetProductsList extends Action {
  public function __invoke(Request $request, ProductService $service) {
    try {
      return ProductResource::collection($service->getProductsList($request->getPagination()));
    } catch (Exception $exception) {
      return response()->json([
        'error' => $exception->getMessage(),
        'code' => $exception->getCode(),
      ]);
    }
  }
}
