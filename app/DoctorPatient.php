<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{

    protected $table = 'doctor_patients';

    public $primaryKey = 'id';

    public $timestamps = true;

    // protected $fillable = ['claim_id', 'firstname', 'lastname', 'middlename', 'amount', 'patient_id', 'card_id'];

}
