<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
  protected $table = 'hospitals';

  public $primaryKey = 'id';

  public $timestamps = true;
}
