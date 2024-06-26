<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany};
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Product extends Model {
  use HasUuid, SoftDeletes;

  protected $fillable = [
    'name',
    'description',
    'price',
    'currency',
    'image_url',
    'cta_url'
  ];

  public function categories(): BelongsToMany {
    return $this->belongsToMany(Category::class);
  }
}
