<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_name');
            $table->string('des');
            $table->integer('basic');
            $table->integer('epf_lvl');
            $table->integer('minimum_attendance');
            $table->integer('fa');
            $table->integer('fd');
            $table->integer('va');
            $table->integer('vd');
            $table->timestamps();
        });

        DB::table('salary_groups')->insert(
            array(
                'group_name' => 'G1',
                'des' => 'Basic Sal',
                'basic' => 50500,
                'epf_lvl' => 1000,
                'minimum_attendance' => 4,
                'fa' => 1203,
                'fd' => 784,
                'va' => 1203,
                'vd' => 784,

            ),

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_groups');
    }
}
