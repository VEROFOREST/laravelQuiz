<?php
namespace App\Repositories;

use App\Model\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   public function all(): Collection;

   public function findById($user_id);
   
}