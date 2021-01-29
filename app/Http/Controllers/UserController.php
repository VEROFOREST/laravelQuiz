<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Repositories\UserRepositoryInterface;


class UserController extends Controller
{
   private $userRepository;
   public function __construct(UserRepositoryInterface $userRepository)
   {
       $this->UserRepository->$userRepository;
   }

   public function index()
   {
       $users = $this->userRepository->all();
       return $users;
   }
}
