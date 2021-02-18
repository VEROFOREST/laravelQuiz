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
       return User::where('answer_id', $answer_id);
   }

    public function showAnswer($data)
    {
        $answer = Answer::with('Question')->where('id','$idAnswer')->get();

           
                return $answer;
           
        // $allAnswers = collect(Answer::with('question')->get());
        
        
    }
        
   
}