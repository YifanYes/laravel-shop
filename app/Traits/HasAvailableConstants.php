<?php

namespace App\Traits;

use ReflectionClass;

trait HasAvailableConstants {
  /**
   * @param string status_prefix
   */
  public static function availableConstants(string $const_prefix = ''): array {
    return array_filter(
      (new ReflectionClass(get_called_class()))->getConstants(),
      fn ($key) => empty($const_prefix) ? $key : str_contains($key, $const_prefix),
      ARRAY_FILTER_USE_KEY
    );
  }
}
