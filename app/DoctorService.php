<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorService extends Model
{

  protected $table = 'doctor_services';

  public $primaryKey = 'id';

  public $timestamps = true;

}
