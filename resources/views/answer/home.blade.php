@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">

        <!-- </p> {{request()->route('idAnswer')}} <p>  -->

        <p> {{$questionLabel}} </p>

        <p>YOUR ANSWER(S)</p>
        @if(@isset($choiceText))

            {{ $choiceText}}
            @if ($choiceText === $textAnswer)
                    <h3> Winner</h3>
                @else
                    <h3> Looser</h3>
            @endif
           
        @else

            @foreach ($userAnswers as $UserAnswer)
                <p>{{$UserAnswer->answer->answer}} </p>
            @endforeach
            @foreach ($goodAnswers as $good)

            @endforeach
   
            @if ($choiceAnswerId === $goodAnswerId)
                <h3> Winner</h3>
            @else
                <h3> Looser</h3>
            @endif
        @endif
        <p> CORRECT ANSWER(S)</p>
        @foreach ($goodAnswers as $good)
            <p>{{$good->answer}} </p>

        @endforeach
    </div>
</div>

@stop