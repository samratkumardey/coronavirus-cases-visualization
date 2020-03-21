<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BangladeshCovid extends Model
{
    protected $table = 'bangladesh_covids';
    protected $fillable = [
        'date',
        'covid_test',
        'positive',
        'home_quarantine',
        'home_quarantine_release',
        'govt_quarantine',
        'govt_quarantine_release',
        'isolation',
        'isolation_release'
    ];
}
