@extends('layouts.upgrade')

@section('title'," Admin")

@section('utypemin',"A")

@section('utype',"Admin")

@section('avators')
@foreach($propic as $emp)
<img src="/uploads/avatars/{{$emp->avatar}}" class="img-circle" alt="User Image">
@endforeach
@endsection

@section('names')
<p>{{ Auth::user()->username }}</p>
<a href="{{ route('admin-myprofile') }}">
@endsection

@section('homes')
<a href="{{ route('admin.home') }}">
@endsection

@section('records')
<a href="{{ route('user.records') }}">
@endsection

@section('myprofile')
<a href="{{ route('admin-myprofile') }}">
@endsection

@section('functions01',"Manage Admins")

@section('title',"Admin")

@section('title',"Admin")

@section('heading',"Employee")

@section('eachraw')
                    @foreach($data as $emp)

					<tr>

					<td class="priority-1">{{$emp->username}}</td>
					<td class="priority-2">{{$emp->email}}</td>
                    
                    <td class="priority-3">
                        <button type='button' class="btn btn-success" data-role="{{ $emp->user_id }}" data-toggle="modal" data-target="#upgrade">
                            <span class="glyphicon glyphicon-certificate" ></span> Add as User
                          </button>  
                    </td>

 
                    </tr>

                    
                    @endforeach
                    
@endsection

@section('ngv')

        
        <a href="{{route('admin.home')}}" class="btn btn-primary">Back</a>


@endsection

@section('upgrade_path')
<form action="/emp_upgrade" method="post">
@endsection




    


