<?php
namespace App\Repositories;

use App\Model\Question;
use Illuminate\Support\Collection;

interface QuestionRepositoryInterface
{
   public function all(): Collection;


   public function quiz(): Collection;
   
}