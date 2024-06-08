<?php

namespace App\ValueObjects;

use App\Traits\HasAvailableConstants;
use LogicException;

class Currency extends StringValueObject implements StringValueObjectInterface {
  use HasAvailableConstants;

  // America
  public const USD = 'USD';
  public const CAD = 'CAD';
  public const ARS = 'ARS';
  public const BRL = 'BRL';
  public const MXN = 'MXN';

  // Europe
  public const EUR = 'EUR';
  public const GBP = 'GBP';
  public const CHF = 'CHF';
  public const NOK = 'NOK';
  public const SEK = 'SEK';

  // Asia
  public const JPY = 'JPY';
  public const CNY = 'CNY';
  public const INR = 'INR';
  public const KRW = 'KRW';
  public const AUD = 'AUD';

  // Middle East & Africa
  public const AED = 'AED';
  public const SAR = 'SAR';
  public const ZAR = 'ZAR';
  public const QAR = 'QAR';
  public const NGN = 'NGN';

  /**
   * @param array $arguments
   * @throws LogicException
   */
  public static function __callStatic(string $name, $arguments): Currency {
    $status = parent::getConstName($name, self::class);

    return new static($status);
  }

  public static function all(): array {
    return [
      self::USD,
      self::CAD,
      self::ARS,
      self::BRL,
      self::MXN,
      self::EUR,
      self::GBP,
      self::CHF,
      self::NOK,
      self::SEK,
      self::JPY,
      self::CNY,
      self::INR,
      self::KRW,
      self::AUD,
      self::AED,
      self::SAR,
      self::ZAR,
      self::QAR,
      self::NGN,
    ];
  }
}
