<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{

  protected $table = 'coordinators';

  public $primaryKey = 'id';

  public $timestamps = true;

}
