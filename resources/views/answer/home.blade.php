@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">

        <!-- </p> {{request()->route('idAnswer')}} <p>  -->

        <h3 class="text-center"> {{$questionLabel}} </h3>
        <div class="row justify-content-around">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    @if(@isset($choiceText))
                    <h5 class="card-title">YOUR ANSWER(S)</h5>

                    <p class="card-text">{{ $choiceText}}</p>

                    @if ($choiceText === $textAnswer)
                    <h3 class="card-text text-info"> Right</h3>
                    @else
                    <h3 class="card-text text-danger"> Wrong</h3>
                    @endif
                    @else

                    <h5 class="card-title">YOUR ANSWER(S)</h5>
                    @foreach ($userAnswers as $UserAnswer)

                    <p class="card-text">{{$UserAnswer->answer->answer}}</p>
                    @endforeach
                    @if ($choiceAnswerId === $goodAnswerId)
                        <h3 class="card-text text-info"> Right</h3>
                    @else
                     <h3 class="card-text text-danger"> Wrong</h3>
                    @endif

                    @endif
                </div>
            </div>
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">CORRECT ANSWER(S)</h5>
                    @foreach ($goodAnswers as $good)
                    <p class="card-text">{{$good->answer}}</p>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</div>

@stop