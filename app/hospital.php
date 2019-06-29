<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hospital extends Model
{
    //
    protected $table = 'hospital';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'address'
    ];
}
