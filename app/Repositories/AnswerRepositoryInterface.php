<?php
namespace App\Repositories;

use App\Model\Answer;
use Illuminate\Support\Collection;

interface AnswerRepositoryInterface
{
   public function all(): Collection;
public function findById($user_id);
  

   public function showAnswer($data);
   
}