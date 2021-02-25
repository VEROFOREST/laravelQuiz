<?php
namespace App\Repositories;

use App\Model\Answer;
use Illuminate\Support\Collection;

interface AnswerRepositoryInterface
{
   public function all(): Collection;
public function findById($answer_id);
  

   public function showAnswer($answer_id);
   
}