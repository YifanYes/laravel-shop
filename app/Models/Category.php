<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
  use HasUuid;

  public $timestamps = false;

  protected $fillable = [
    'name',
  ];
}
