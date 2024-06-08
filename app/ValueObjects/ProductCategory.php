<?php

namespace App\ValueObjects;

use App\Traits\HasAvailableConstants;
use App\ValueObjects\GenericTypes\{StringValueObject, StringValueObjectInterface};
use LogicException;

class ProductCategory extends StringValueObject implements StringValueObjectInterface {
  use HasAvailableConstants;

  public const CLOTHING = 'clothing';
  public const APPLIANCES = 'appliances';
  public const ELECTRONICS = 'electronics';

  /**
   * @param array $arguments
   * @throws LogicException
   */
  public static function __callStatic(string $name, $arguments): ProductCategory {
    $status = parent::getConstName($name, self::class);

    return new static($status);
  }

  public static function all() {
    return [self::CLOTHING, self::APPLIANCES, self::ELECTRONICS];
  }
}
