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

   public function quiz(): Collection
   {
       $quizes = Question::with('answers')->get();
      
       return $quizes; 
   }

}