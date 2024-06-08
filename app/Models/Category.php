<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\{Model};

class Category extends Model {
  use HasUuid;

  protected $fillable = [
    'name',
  ];
}
