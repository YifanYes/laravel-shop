<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid {
  protected static function boot() {
    parent::boot();

    static::creating(function ($model) {
      $model->uuid = Str::uuid();
    });
  }

  /**
   * Find model by `uuid` attribute.
   */
  protected static function findByUuid(string $uuid) {
    return static::firstWhere('uuid', $uuid);
  }
}
