<?php

namespace App\Repositories;

use App\Models\User;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;


class UserRepository implements UserRepositoryInterface
{

   

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return User::all();  
   }

   public function findById($user_id)
   {
       return User::where('user_id', $user_id);
   }
   public function register($data)
   {
      
      return User::create($data)->save();

   }
}