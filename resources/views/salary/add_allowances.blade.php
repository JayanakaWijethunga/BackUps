@extends('salary.salary_layouts.allowances')

@section('title',"User")

@section('utypemin',"U")

@section('utype',"User")

@section('avators')
@foreach($propic as $emp)
<img src="/uploads/avatars/{{$emp->avatar}}" class="img-circle" alt="User Image">
@endforeach
@endsection

@section('names')
<p>{{ Auth::user()->username }}</p>
<a href="{{ route('user-myprofile') }}">
@endsection

@section('homes')
<a href="{{ route('user.home') }}">
@endsection

@section('records')
<a href="{{ route('employee.records') }}">
@endsection

@section('allowance')
<li class="active">
<a href="{{ route('employee.allowances') }}"> 
<i class="fa fa-tasks"></i> <span>Manage Allowance</span></a></li>
@endsection

@section('deduction')
<li class="">
<a href="{{ route('employee.deductions') }}"> 
<i class="fa fa-tasks"></i> <span>Manage Deduction</span></a></li>
@endsection

@section('funds')
<li class="">
<a href="{{ route('employee.funds') }}"> 
<i class="fa fa-tasks"></i> <span>Manage Funds</span></a></li>
@endsection

@section('sal_grp')
<li class="">
<a href="{{ route('employee.sal_grp') }}"> 
<i class="fa fa-tasks"></i> <span>Manage Salary Groups</span></a></li>
@endsection

@section('attendance')
<li class="">
<a href="{{ route('employee.attendance') }}"> 
<i class="fa fa-tasks"></i> <span>Manage Attendance</span></a></li>
@endsection

@section('myprofile')
<a href="{{ route('user-myprofile') }}">
@endsection

@section('generate_salary')
<li class="">
<a href="{{ route('employee.generate_sal') }}"> 
<i class="fa fa-tasks"></i> <span>Generate Salary</span></a></li>
@endsection

@section('functions01',"Manage Employee")

@section('core')

<div class="box">

    <div  style="padding:10px;">
    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#add_allow"><i class="fa fa-user"></i> Add New Allowance Type
    </button>
    </div>
    

        <div class="box-header">
          <h3 class="box-title">Create New Fixed Allowance</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Allowance type</th>
                  <th>Amount</th>
                  
                </tr>
                </thead>
                <tbody>
                
                        @foreach ($allows as $allow)
                    
                        <tr>
                          <td>{{$allow->id}}</td>
                            <td>{{$allow->allowance_type}}</td>
                            <td>{{$allow->amount}}</td>
                            
                          </tr>
                        @endforeach
          

            
           
       
            </tbody>
            
          </table>
        </div>


@endsection

