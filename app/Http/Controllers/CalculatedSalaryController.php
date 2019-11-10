<?php

namespace App\Http\Controllers;

use App\CalculatedSalary;
use App\User;
use App\Attendance;
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
        $attendance = Attendance::all();
        $emps = User::all();
        
        
        if(!($attendance->isEmpty() && $emps->isEmpty())){


            foreach ($emps as $emp) {
                
            $newSalary = new CalculatedSalary;
            $newSalary->employee_email=$emp->email;
            
            $finance = DB::table('employee_financials')->where('id', $emp->id)->first();
            $salgrup = DB::table('salary_groups')->where('group_name', $finance->sal_grp)->first();
           
            $newSalary->basic_salary=$salgrup->basic;
            $newSalary->total_allowance= ($salgrup->fa + $salgrup->va);

            $atten = DB::table('attendances')->where('emp_email', $emp->email)->first();
            
            if(!empty($atten)){

            if(($atten->total_absence - $salgrup->minimum_attendance) > 0){

            $newSalary->leave_nopay = ($atten->total_absence - $salgrup->minimum_attendance)*8*100;
            
            }else{

                $newSalary->leave_nopay=0;

            }
            }else{
                $newSalary->leave_nopay=0;
            }

            $newSalary->total_deduction= ($salgrup->fd + $salgrup->vd + $newSalary->leave_nopay);
            
            $newSalary->total_salary = ($newSalary->basic_salary + $newSalary->total_allowance - $newSalary->total_deduction);
        
            $newSalary->save();
        
        }




        }
        
        

        return back();
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
