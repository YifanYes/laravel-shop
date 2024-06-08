<?php

namespace App\ValueObjects\GenericTypes;

interface StringValueObjectInterface {
  public static function __callStatic(string $name, $arguments);
}
