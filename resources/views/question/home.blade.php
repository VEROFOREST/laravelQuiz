@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">
        @foreach($quizzes as $quiz)

            <p><span class='lead'></span> {{ $quiz['label'] }}</p>
            
            <p class='lead'>Réponse(s) :</p>

            <form>
                @foreach($quiz['answers'] as $answer)

                 @if($quiz['type_id'] == 1)
                 <input class="form-textarea" type="textarea" name="textanswer" id="" value="Indiquer votre réponse">
                @endif
                
                        
                @if($quiz['type_id'] == 2)   
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="checkboxanswer" id="" value="{{$answer['id']}}">
                    <label class="form-check-label" for="checkboxanswer">
                        {{$answer['answer']}}
                    </label>
                </div>
                @endif
                 @if($quiz['type_id'] == 3)   
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioanswer" id="" value="{{$answer['id']}}">
                    <label class="form-check-label" for="radioanswer">
                        {{$answer['answer']}}
                    </label>
                </div>
                @endif
                @endforeach
            </form>

            </div
        @endforeach


        <div class="py-2 text-center">
            <button id="btn-answer" type="submit" class="btn btn-sm btn-info">Submit</button>
        </div>
    </div>
</div>

@stop