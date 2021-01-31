<?php
namespace App\Repositories;

use App\Model\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;



interface UserRepositoryInterface
{
   public function all(): Collection;

   public function findById($user_id);
   
   public function register($data) ;
   
}