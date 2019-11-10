<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use DB;
use Auth;
use Importer;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attens = DB::table('attendances')->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        
        return view('salary.attendance',compact(['propic','attens']));
       
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
            'file' => 'required|max:5000|mimes:xlsx,xls,csv',
            

        ]);

        /*$path = $request->file('file')->getRealPath();
        $data = Excel::import($path)->get();*/

        $dateTime = date('Ymd_His');
        $file = $request->file('file');
        $fileName = $dateTime . '-' .$file->getClientOriginalName();
        $savePath = public_path('/uploads/attendance/');
        $file->move($savePath,$fileName);

        $excel = Importer::make('Excel');
        $excel->load($savePath.$fileName);
        $collection = $excel->getCollection(); 

        

            for($row=1;$row<sizeof($collection);$row++){

            $insert_data[] = [
                'emp_email' => $collection[$row][0],
                'total_presence' => $collection[$row][31],
                'total_absence' => $collection[$row][32],
            ];

            
           
            var_dump($collection[$row][0]) ;
            var_dump($collection[$row][31]) ;
            var_dump($collection[$row][32]) ;
            }

            if(!empty($insert_data)){

                DB::table('attendances')->insert($insert_data);
    
            }
        
        

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        DB::table('attendances')->delete();
        return back();
    }
}
