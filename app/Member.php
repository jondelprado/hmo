<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $table = 'members';

  public $primaryKey = 'id';

  public $timestamps = true;


}
