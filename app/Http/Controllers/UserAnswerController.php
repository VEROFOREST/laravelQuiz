<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

use App\Models\UserAnswer;


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
            $arrayChecked = $request->answerUser;
            
            foreach ($arrayChecked as $answerChecked) 
            {
                $userId = $request->userHidden;
                if(intval($answerChecked) === 0)
                {
                    $input = ['users_id' => $userId, 'answers_id' => null, 'label_answer' => $arrayChecked[0]];
                    
                } else 
                {
                    $input = ['users_id' => $userId, 'answers_id' => $answerChecked];
                }
                
                $this->UserAnswerRepository->saveAnswer($input);
                
                
                 $idAnswer = UserAnswer::latest()->get()->first()->answers_id;
                //  dd($idAnswer);
            }
        return redirect()->action(
            [AnswerController::class, 'showAnswer'],
            ['userId' => $userId,
            'idAnswer'=>$idAnswer,]
            
        );
                
    }
        
    

}