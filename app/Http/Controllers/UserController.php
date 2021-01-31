<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;


class UserController extends Controller
{
   private $userRepository;
   public function __construct(UserRepositoryInterface $userRepository)
   {
       $this->UserRepository=$userRepository;
   }

    public function createForm()
    {
        return view('user.home');
    }

    public function register(Request $request)
    {
         $input = $request->all();
        $regUser = $this->UserRepository->register($input);
       
        return redirect('/question');
    }
}