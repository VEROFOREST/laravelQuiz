<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Repositories\AnswerRepositoryInterface;
use Illuminate\Support\Collection;

class AnswerRepository  implements AnswerRepositoryInterface
{
   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return Answer::all();    
   }
   public function findById($answer_id)
   {
       return Answer::where('id', $answer_id);
   }

    public function showAnswer($answer_id)
    {
        $answer = Answer::with('Question')->where('id','$answer_id')->get();

           
                return $answer;
           
        // $allAnswers = collect(Answer::with('question')->get());
        
        
    }
        
   
}