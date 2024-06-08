<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
  use HasUuid;

  public $timestamps = false;

  protected $fillable = [
    'name',
  ];

  public function products(): HasMany {
    return $this->hasMany(Product::class);
  }
}
