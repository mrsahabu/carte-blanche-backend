<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diagnosis extends Model
{
    //
    protected $table = 'diagnosis';
    public $timestamps = false;
    protected $fillable = [
        'temperature',
        'blood_pressure',
        'diagnosis',
        'comments',
        'doctor_id',
        'patient_id',
        'sugar_level'
    ];
}
