<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculatedSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculated_salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_email')->unique();;
            $table->integer('basic_salary');
            $table->integer('total_allowance');
            $table->integer('leave_nopay');
            $table->integer('total_deduction');
            $table->integer('total_salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculated_salaries');
    }
}
