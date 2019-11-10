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
<li class="active">
<a href="{{ route('employee.sal_grp') }}"> 
<i class="fa fa-tasks"></i> <span>Manage Salary Groups</span></a></li>
@endsection

@section('attendance')
<li class="">
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

<div class="box">

    <div  style="padding:10px;">
    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#salarygrp"><i class="fa fa-user"></i> Add Salary Group
    </button>
    </div>
    

        <div class="box-header">
          <h3 class="box-title">Salary Group List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Basic Salary</th>
              <th>EPF/ETF</th>
              <th>Min. Attendance</th>
              <th>Fixed Allowance</th>
              <th>Fixed Deduction</th>
              <th>Variable Allowance</th>
              <th>Variable Deduction</th>
            </tr>
            </thead>
            <tbody>
            
                    @foreach ($sl as $salary_group)
                
                    <tr>
                      <td>{{$salary_group->id}}</td>
                        <td>{{$salary_group->group_name}}</td>
                        <td>{{$salary_group->des}}</td>
                        <td>{{$salary_group->basic}}</td>
                        <td>{{$salary_group->epf_lvl}}</td>
                        <td>{{$salary_group->minimum_attendance}}</td>
                        <td>{{$salary_group->fa}}</td>
                        <td>{{$salary_group->fd}}</td>
                        <td>{{$salary_group->va}}</td>
                        <td>{{$salary_group->vd}}</td>
                      </tr>
                    @endforeach
          

            
           
       
            </tbody>
            
          </table>
        </div>

        <div class="modal fade" id="salarygrp">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Create Salary group</h4>
                </div>
                <div class="modal-body">
                  
                    <form action="{{route('addsal')}}" method="post">
                            {{csrf_field()}}
        
        
                        <div class="form-group">
                        <label for="group_name">Group Name</label>
                        <input type="text" class="form-control" name="group_name" id="group_name" placeholder="Group name">
                        </div>
        
                        <div class="form-group">
                        <label for="name">Description</label>
                        <input type="text" class="form-control" name="des" id="des" placeholder="Description">
                        </div>
        
                        <div class="form-group">
                        <label for="epf">Basic Salary</label>
                        <input type="text" class="form-control" name="basic" id="basic" placeholder="Basic Salary">
                        </div>   
        
                        <div class="form-group">
                          <label>EPF Level</label>
                          <select class="form-control select2" name="epf_lvl" style="width: 100%;">
                            
                              @foreach ($epfs as $epf)
                              <option>{{$epf->level}}</option>
                              @endforeach
                          </select>
                          </div>
        
                          <div class="form-group">
                            <label for="minimum_attendance">Minimum Leave days</label>
                          <div class="spinner" data-trigger="spinner" id="spinner">
                            
                              <input data-max="20" class="form-control" name="minimum_attendance" type="text" value="1" data-rule="quantity">
                            
                              <div class="spinner-controls">
                            
                                <a href="javascript:;" data-spin="up">+</a>
                            
                                <a href="javascript:;" data-spin="down">-</a>
                            
                              </div>
                            
                            </div>
                          </div>
                  
        
                        <div class="form-group">
                                <label for="epf">Fixed Allowances</label>
                                
                        
                        
                        @foreach ($fixall as $fix)
                        
                        <div class="checkbox">
                        <label>
                        <input type="checkbox" name="fa[]" value="{{ $fix->id }}">
                        {{$fix->allowance_type}}
                        </label>
                        </div>
                        
                        @endforeach
        
                        <div class="form-group">
                          <label for="epf">Fixed Deduction</label>
                          
                  
                  
                  @foreach ($fixded as $fixd)
                  
                  <div class="checkbox">
                  <label>
                  <input type="checkbox" name="fd[]" value="{{ $fixd->id }}">
                  {{$fixd->deduction_type}}
                  </label>
                  </div>
                  
                  @endforeach
           
                    
                <div class="form-group">
                <label for="va">Variable Allowance</label>
                <input type="text" class="form-control" name="va" id="va" placeholder="Variable Allowance">
                </div> 
                
                <div class="form-group">
                <label for="vd">Variable Deduction</label>
                <input type="text" class="form-control" name="vd" id="vd" placeholder="Variable Deduction">
                </div> 
        
        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Create Salary Group</button>
                </div>
              </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

@endsection