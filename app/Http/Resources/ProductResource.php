<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array {
    return [
      'id' => $this->uuid,
      'name' => $this->name,
      'price' => $this->price,
      'currency' => $this->currency,
      'description' => $this->description,
      'categories' => $this->categories->pluck('name'),
      'image_url' => $this->image_url,
      'cta' => $this->cta_url,
    ];
  }
}
