<?php
namespace App\Repositories;


use Illuminate\Support\Collection;

interface UserAnswerRepositoryInterface
{
  public function saveAnswer($data);
  public function UserAnswershow($userId);
}