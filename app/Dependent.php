<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
  protected $table = 'dependents';

  public $primaryKey = 'id';

  public $timestamps = true;
}
