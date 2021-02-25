<?php

namespace App\Repositories;

use App\Models\Question;
use App\Repositories\QuestionRepositoryInterface;
use Illuminate\Support\Collection;

class QuestionRepository  implements QuestionRepositoryInterface
{
   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return Question::all();    
   }

   public function showQuizz(): Collection
   {
     $quizes = collect(Question::with('answers')->get()->random(1));
      
       return $quizes; 
   }

   public function findByIdCorrectAnswers($id)
   {
     return Question::find($id)->answers->where('isValid', 1);
   }
  public function findByType($id)
  {
   return Question::find($id)->type;
  }

  public function findByLabel($id)
  {
    return Question::find($id)->label;

  }
}