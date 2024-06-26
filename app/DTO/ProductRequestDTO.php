<?php

namespace App\DTO;

class ProductRequestDTO {
  /**
   * @param string $name
   * @param int $price
   * @param string $currency
   * @param ?string $description
   * @param ?array $categories
   * @param ?string $imageUrl
   * @param ?string $ctaUrl
   */
  public function __construct(
    readonly string $name,
    readonly int $price,
    readonly string $currency,
    readonly ?string $description = null,
    readonly ?array $categories = null,
    readonly ?string $imageUrl = null,
    readonly ?array $ctaUrl = null,
  ) {
  }
}
