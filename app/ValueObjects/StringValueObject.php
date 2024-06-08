<?php

namespace App\ValueObjects;

use Illuminate\Support\Str;
use LogicException;

class StringValueObject {
  /**
   * @var string $value
   */
  protected $value;

  protected function __construct(string $value) {
    $this->value = $value;
  }

  protected static function getConstName(string $name, string $class): string {
    $constName = sprintf('%s::%s', $class, strtoupper(Str::snake($name)));

    if (!defined($constName)) {
      throw new LogicException('Undefined type: ' . $constName);
    }

    return constant($constName);
  }

  public function __toString(): string {
    return $this->value;
  }

  /**
   * @param self $otherStatus
   */
  public function equals(self $otherValue): bool {
    return $this->value === $otherValue->value;
  }

  /**
   * @param self $otherStatus
   */
  public function notEquals(self $otherValue): bool {
    return $this->value !== $otherValue->value;
  }

  /**
   * @return bool $result
   */
  public function notIn(array $statuses): bool {
    return count(array_filter($statuses, fn ($status) => $this->equals($status) === 0));
  }

  public function in(array $statuses): bool {
    return count(array_filter($statuses, fn ($status) => $this->equals($status) > 0));
  }
}
