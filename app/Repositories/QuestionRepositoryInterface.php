<?php
namespace App\Repositories;

use App\Model\Question;
use Illuminate\Support\Collection;

interface QuestionRepositoryInterface
{
   public function all(): Collection;


   public function showQuizz(): Collection;

   public function findByIdCorrectAnswers($id);

    public function findByType($id);
    public function findByLabel($id);

   
}