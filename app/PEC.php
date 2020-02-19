<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PEC extends Model
{
  protected $table = 'pecs';

  public $primaryKey = 'id';

  public $timestamps = true;
}
