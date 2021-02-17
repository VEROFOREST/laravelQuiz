<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;



use App\Repositories\UserAnswerRepositoryInterface;
use PhpParser\Node\Stmt\Foreach_;

class UserAnswerController extends Controller
{
    
    public function __construct(UserAnswerRepositoryInterface $userAnswerRepository)
    {
        $this->UserAnswerRepository = $userAnswerRepository;
    }



    public function saveAnswer(Request $request)
    {
        $typeAnswer = $request->typeAnswerHidden;

        if ($typeAnswer === "1") {
            $answer = $request->textanswer;
            $request->except('_token');
            $userId = $request->userHidden;
            $data = ['users_id' => $userId, 'answers_id' => null, 'label_answer' => $answer];
            $registerAnswer = $this->UserAnswerRepository->saveAnswer($data);
        }
        elseif ($typeAnswer === "2")
        {
            $answers = $request->checkboxanswer;
            foreach ($answers as $answer) {

                $request->except('_token');
                $userId = $request->userHidden;
                $data = ['users_id' => $userId, 'answers_id' => $answer];
                $registerAnswer = $this->UserAnswerRepository->saveAnswer($data);
            }
        } 
        else 
        {
            $answers = $request->radioanswer;
            foreach ($answers as $answer) {

                $request->except('_token');
                $userId = $request->userHidden;
                $data = ['users_id' => $userId, 'answers_id' => $answer];
                $registerAnswer = $this->UserAnswerRepository->saveAnswer($data);
            }
        }

        
    }
}
