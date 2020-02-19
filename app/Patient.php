<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

  protected $table = 'patients';

  public $primaryKey = 'id';

  public $timestamps = true;

}
