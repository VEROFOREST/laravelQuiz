@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3 border py-2">

   <!-- </p> {{request()->route('idAnswer')}} <p>  -->

   <p> {{$answer->question->label}} </p> 
    
  
            @if ($allAnswers === $goodAnswers )
                <h3> Winner</h3> 
            @else
                <h3> Looser</h3> 
            @endif
     
    
    
   <p> YOUR ANSWER(S)</p>
    @foreach ($allAnswers as $choice)
   <p>{{$choice->answer->answer}}  </p> 
   
   @endforeach
   <p> CORRECT ANSWER(S)</p>
   @foreach ($goodAnswers as $goodAnswer)
   <p>{{$goodAnswer->answer}}  </p> 
   @endforeach
   </p>  <p> 

   
   <!-- </p> {{request()->route('id')}} <p>  -->

    </div>
</div>
</div>
</div>

@stop