@extends('layouts.register_form')

@section('title',"S-Admin")

@section('headers',"S-Admin")

@section('form_part')
   <form class="well form-horizontal" action="{{route('sadmin.registers')}}" method="POST">
@endsection

@section('backs')
   <a href="{{route('login')}}" class="btn btn-info">Back</a>
@endsection