@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">
        @foreach($quizzes as $quiz)

            <p><span class='lead'></span> {{ $quiz['label'] }}</p>
            {{var_dump ($quiz['types'])}}
            <p class='lead'>Réponse(s) :</p>

                @foreach($quiz['answers']->shuffle() as $answer)
            <form>
                 @if($quiz['type'] == "text")
                 <input class="form-textarea" type="textarea" name="textanswer" id="" value="{{$answer['id']}}">
                @endif
                
                        
                   
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="" value="{{$answer['id']}}">
                    <label class="form-check-label" for="answer">
                        {{$answer['answer']}}
                    </label>
                </div>
            </form>
                @endforeach

        @endforeach


        <div class="py-2 text-center">
            <button id="btn-answer" type="submit" class="btn btn-sm btn-info">Submit</button>
        </div>
    </div>
</div>

@stop