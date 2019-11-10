<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowance_type extends Model
{
    protected $table = 'allowance_types';

    protected $fillable = [
        'allowance_type','amount'
    ];
}
