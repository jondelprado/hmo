<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{

    protected $table = 'doctor_patients';

    public $primaryKey = 'id';

    public $timestamps = true;

}
