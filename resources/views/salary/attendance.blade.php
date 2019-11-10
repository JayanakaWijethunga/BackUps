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
<li class="">
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
<li class="active">
<a href="{{ route('employee.attendance') }}"> 
<i class="fa fa-tasks"></i> <span>Manage Attendance</span></a></li>
@endsection

@section('generate_salary')
<li class="">
<a href="{{ route('employee.generate_sal') }}"> 
<i class="fa fa-tasks"></i> <span>Generate Salary</span></a></li>
@endsection



@section('myprofile')
<a href="{{ route('user-myprofile') }}">
@endsection

@section('functions01',"Manage Employee")

@section('core')

<form action="{{route('addattend')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <h2>Select File to upload</h2>
    <br><br>

    <input type="file" name="file" id="file">
    <br><br>

    <button type="submit">Upload File</button>
    <br><br>

</form>

<br><br>

<div class="box">

    <div  style="padding:10px;">
    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createEmp"><i class="fa fa-user"></i> Add Employee
    </button>
    </div>
    

        <div class="box-header">
          <h3 class="box-title">Employee List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>#</th>
              
              <th>Email</th>
              <th>Presence Days</th>
              <th>Absence Days</th>
              
            </tr>
            </thead>
            <tbody>
            
          @foreach ($attens as $atten)
              
          <tr>
              <td>{{$atten->id}}</td>
              <td>{{$atten->emp_email}}</td>
              <td>{{$atten->total_presence}}</td>
              <td>{{$atten->total_absence}}</td>

            </tr>
          @endforeach

            
           
       
            </tbody>
            
          </table>
        </div>


@endsection

