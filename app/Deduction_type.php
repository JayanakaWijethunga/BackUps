<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deduction_type extends Model
{
    protected $table = 'deduction_types';

    protected $fillable = [
        'deduction_type','amount'
    ];
}
