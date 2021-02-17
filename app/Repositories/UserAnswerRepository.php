<?php

namespace App\Repositories;

use App\Models\UserAnswer;
use App\Repositories\UserAnswerRepositoryInterface;
use Illuminate\Support\Collection;

class UserAnswerRepository  implements UserAnswerRepositoryInterface
{
   

   public function saveAnswer($data){
     
       return UserAnswer::create($data)->save();
   }

}