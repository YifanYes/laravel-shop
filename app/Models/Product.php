<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Product extends Model {
  use HasUuid, SoftDeletes;

  protected $fillable = [
    'name',
    'description',
    'price',
  ];
}
