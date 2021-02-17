<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->UserRepository = $userRepository;
    }

    public function createForm()
    {
        return view('user.home');
    }

    public function register(Request $request)
    {
        $input = $request->all();
        $regUser = $this->UserRepository->register($input);
        $id = DB::getPdo()->lastInsertId();

        // dd($id);
        return redirect()->action(
            [QuestionController::class, 'showQuizz'],
            ['id' => $id]
        );
    }
}
