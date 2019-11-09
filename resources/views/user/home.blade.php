@extends('layouts.dashboard')

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

@section('myprofile')
<a href="{{ route('user-myprofile') }}">
@endsection

@section('functions01',"Manage Employee")


@section('contents')


      @foreach($data as $emp)
      <tr>
        <td>{{ $emp->user_id }}</td>
        <td>{{ $emp->username }}</td>
        <td>{{ $emp->email }}</td>
        
      </tr>
      @endforeach

 
@endsection