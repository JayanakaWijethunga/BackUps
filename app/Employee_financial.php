<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_financial extends Model
{
    protected $fillable = [
        'sal_grp','bank','bbranch','acc',
    ];
}
