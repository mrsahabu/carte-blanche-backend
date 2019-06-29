<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctors extends Model
{
    //
    protected $table = 'doctors';
    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'address',
        'last_name',
        'college',
        'qualification',
        'hospital_id',
        'user_id'

    ];
}
