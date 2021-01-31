@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">
{{ Form::open(array ('action' => ['UserController@register'], 'method' => 'POST')) }}
    
    {{Form::label('name')}}
   {{Form::text('name')}}
    <p>{{Form :: label ('Email')}}
        {{Form ::email('email')}}</p>

    <div>
    {{Form::submit('Send!')}}
    </div>
    @csrf_field 
    <!-- <input name="_token" type="hidden" value="{{ csrf_token() }}"> -->
{{ Form::close() }}

@endsection