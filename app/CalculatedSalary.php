<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalculatedSalary extends Model
{
    protected $table = 'calculated_salaries';

    protected $fillable = [
        'employee_email','basic_salary','total_allowance','leave_nopay','total_deduction','total_salary'
    ];
}
