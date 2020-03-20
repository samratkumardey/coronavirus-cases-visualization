<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    protected $table = 'covids';
    protected $fillable = [
        'state',
        'country',
        'last_update',
        'confirmed',
        'deaths',
        'recovered',
        'latitude',
        'longitude',
        'batch'
    ];
}
