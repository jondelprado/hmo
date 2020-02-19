<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coverage extends Model
{
  protected $table = 'coverages';

  public $primaryKey = 'id';

  public $timestamps = true;
}
