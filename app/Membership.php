<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
  protected $table = 'memberships';

  public $primaryKey = 'id';

  public $timestamps = true;
}
