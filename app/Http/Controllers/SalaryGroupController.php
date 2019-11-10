<?php

namespace App\Http\Controllers;

use App\SalaryGroup;
use Illuminate\Http\Request;
use DB;
use Auth;
class SalaryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sl=DB::table('salary_groups')->get();
        $fixall = DB::table('allowance_types')->get();
        $fixded = DB::table('deduction_types')->get();
        $epfs = DB::table('funds')->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        return view('salary.add_salarygroup',compact(['propic','sl','fixall','fixded','epfs']));
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
        $this->validate($request,[
            'group_name' => 'required',
            'des' => 'required',
            'basic' => 'required',
            'minimum_attendance'=> 'required',
            'epf_lvl'=> 'required',
            'fa' => 'required',
            'fd' => 'required',
            'va' => 'required',
            'vd' => 'required',

        ]);

        $salGroup = new SalaryGroup;

        $salGroup->group_name=$request->input('group_name');
        $salGroup->des=$request->input('des');
        $salGroup->basic=$request->input('basic');

        $epf_all=$request->epf_lvl;
        $current_epf_level = DB::table('funds')->where('level', $epf_all)->first();
        $tot=0;
        $tot=($salGroup->basic*$current_epf_level->epf)/100 + ($salGroup->basic*$current_epf_level->etf)/100 - $current_epf_level->stamp;
        
        $salGroup->epf_lvl=$tot;

            $sum=0;
            $all_fa=$request->fa;

        foreach($all_fa as $allow_select){
            $current_fa = DB::table('allowance_types')->where('id', $allow_select)->first();
            $sum=$sum+ ($current_fa->amount);
            

        }

        $salGroup->fa=$sum;

        $salGroup->minimum_attendance=$request->minimum_attendance;

        $dedSum=0;
        $all_ded=$request->fd;

        foreach($all_ded as $ded_select){
            $current_fd = DB::table('deduction_types')->where('id', $ded_select)->first();
            $dedSum=$dedSum+ ($current_fd->amount);
            

        }

        $salGroup->fd=$dedSum;

        $salGroup->va=$request->input('va');
        $salGroup->vd=$request->input('vd');


        $salGroup->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalaryGroup  $salaryGroup
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryGroup $salaryGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalaryGroup  $salaryGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaryGroup $salaryGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalaryGroup  $salaryGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryGroup $salaryGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalaryGroup  $salaryGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryGroup $salaryGroup)
    {
        //
    }
}
