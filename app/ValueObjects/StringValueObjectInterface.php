<?php

namespace App\ValueObjects;

interface StringValueObjectInterface {
  public static function __callStatic(string $name, $arguments);
}
