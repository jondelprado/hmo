<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
  protected $table = 'standards';

  public $primaryKey = 'id';

  public $timestamps = true;
}
