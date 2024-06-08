<?php

namespace App\DTO;

class ProductRequestDTO {
  /**
   * @param string $name
   * @param int $price
   * @param string $currency
   * @param ?string $description
   * @param ?array $categories
   */
  public function __construct(
    readonly string $name,
    readonly int $price,
    readonly string $currency,
    readonly ?string $description = null,
    readonly ?array $categories = null,
  ) {
  }
}
