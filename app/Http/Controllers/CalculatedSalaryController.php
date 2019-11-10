<?php

namespace App\Http\Controllers;

use App\CalculatedSalary;
use Illuminate\Http\Request;
use DB;
use Auth;

class CalculatedSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cal_sals = DB::table('calculated_salaries')->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('salary.generate_salary',compact(['propic','cal_sals']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CalculatedSalary  $calculatedSalary
     * @return \Illuminate\Http\Response
     */
    public function show(CalculatedSalary $calculatedSalary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CalculatedSalary  $calculatedSalary
     * @return \Illuminate\Http\Response
     */
    public function edit(CalculatedSalary $calculatedSalary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CalculatedSalary  $calculatedSalary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalculatedSalary $calculatedSalary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CalculatedSalary  $calculatedSalary
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalculatedSalary $calculatedSalary)
    {
        //
    }
}
