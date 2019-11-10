<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryGroup extends Model
{
    protected $table = 'salary_groups';

    protected $fillable = [
        'group_name','minimum_attendance', 'des', 'basic','epf_lvl','fd','fa','vd','va'
    ];
}
