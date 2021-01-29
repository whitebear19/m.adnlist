<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'country_abb',        
        'state_code',
        'state_name',
    ];
}
