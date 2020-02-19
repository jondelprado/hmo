<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorClaim extends Model
{
  protected $table = 'doctor_claims';

  public $primaryKey = 'id';

  public $timestamps = true;
}
