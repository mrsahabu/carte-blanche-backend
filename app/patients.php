<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    //
    protected $table = 'patients';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'address',
        'age',
        'blood_group',
        'contact',
        'doctor_id',
        'user_id'
    ];
}
