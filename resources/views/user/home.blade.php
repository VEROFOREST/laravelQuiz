@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">
        {{ Form::open(array ('action' => ['UserController@register'], 'method' => 'POST')) }}
        {{Form::label('name')}}
        {{Form::text('name')}}
        <div>
        {{Form :: label ('Email')}}
        {{Form ::email('email')}}

        </div>
     <div>
    {{Form::submit('Go to the quizz !',['class' => 'btn btn-primary'])}}

     </div>   
    </div>
</div>


{{ Form::close() }}
@endsection