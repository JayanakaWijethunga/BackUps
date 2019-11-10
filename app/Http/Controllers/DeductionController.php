<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deduction_type;
use Auth;
use DB;
class DeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $deducts=DB::table('deduction_types')->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        return view('salary.add_deductions',compact(['propic','deducts']));
        
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
            'deduction_type' => 'required',
            'amount' => 'required',
            
            

        ]);

        $newDeduct = new Deduction_type;

        $newDeduct->deduction_type=$request->input('deduction_type');
        $newDeduct->amount=$request->input('amount');
       
        $newDeduct->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
