<?php

namespace App\Http\Requests\Product;

use App\DTO\ProductRequestDTO;
use App\ValueObjects\{Currency, ProductCategory};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest {
  public function rules() {
    return [
      'name' => ['required', 'string'],
      'description' => ['nullable', 'string'],
      'price' => ['required', 'integer', 'gt:0'],
      'currency' => ['required', Rule::in(Currency::all())],
      'categories' => ['nullable', 'array'],
      'categories.*' => ['string', Rule::in(ProductCategory::all())],
    ];
  }

  public function validated($key = null, $default = null): ProductRequestDTO {
    $data = parent::validated($key, $default);
    return new ProductRequestDTO(
      $data['name'],
      $data['price'],
      $data['currency'],
      $data['description'] ?? null,
      $data['categories'] ?? null
    );
  }
}
