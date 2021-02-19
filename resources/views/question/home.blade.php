@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">

        <form action="{{ action('UserAnswerController@saveAnswer') }}" , method="POST">
            @csrf
            <p><span class='lead'></span> {{ $quizz['label'] }}</p>

            <p class='lead'>Réponse(s) :</p>



            <input class="form-hidden" type="hidden" name="userHidden" id="" value="{{request()->route('id')}}">
            <input class="form-hidden" type="hidden" name="questionHidden" id="" value="{{$quizz['label']}}">
            <input class="form-hidden" type="hidden" name="idHidden" id="" value="{{$quizz['id']}}">

            
            @foreach($quizz['answers'] as $answer)

            @if($quizz['type_id'] == 1)
            
            <input class="form-textarea" type="textarea" name="answerUser[]" id="" value="">
            @endif


            @if($quizz['type_id'] == 2)
            <div class="form-check">
            

                <input class="form-check-input" type="checkbox" name="answerUser[]" id="" value="{{$answer['id']}}">
                <label class="form-check-label" for="checkboxanswer">
                    {{$answer['answer']}}
                </label>
            </div>
            @endif
            @if($quizz['type_id'] == 3)
            <div class="form-check">
            

                <input class="form-check-input" type="radio" name="answerUser[]" id="" value="{{$answer['id']}}">
                <label class="form-check-label" for="radioanswer">
                    {{$answer['answer']}}
                </label>
            </div>
            @endif
            @endforeach

            <div class="py-2 text-center">
                <button id="btn-answer" type="submit" class="btn btn-sm btn-primary">Check my answer !</button>
            </div>
        </form>

    </div>



</div>
@stop