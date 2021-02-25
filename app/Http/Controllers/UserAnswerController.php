<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

use App\Models\UserAnswer;
use App\Models\Answer;
use App\Models\Question;
use App\Repositories\AnswerRepositoryInterface;
use App\Repositories\QuestionRepositoryInterface;
use App\Repositories\UserAnswerRepositoryInterface;
use PhpParser\Node\Stmt\Foreach_;

class UserAnswerController extends Controller
{

    public function __construct(UserAnswerRepositoryInterface $userAnswerRepository)
    {
        $this->UserAnswerRepository = $userAnswerRepository;
    }
// to save the answer in Db  with a form for answers after each question
    public function saveAnswer(Request $request)
    {
        $arrayChecked = $request->answerUser;

        foreach ($arrayChecked as $answerChecked) {
            $userId = $request->userHidden;
             $questionId = $request->idHidden;

            if (intval($answerChecked) === 0) {
                $input = ['users_id' => $userId, 'answers_id' => null, 'label_answer' => $arrayChecked[0]];
            } else {
                $input = ['users_id' => $userId, 'answers_id' => $answerChecked];
            }
            $this->UserAnswerRepository->saveAnswer($input);
        }
        return redirect()->action(
            [UserAnswerController::class, 'UserAnswershow'],
            [
                'userId' => $userId,
                'questionId' => $questionId,
            ]
        );
    }
    // to send the User's answer and good Answer for question in the view answer 
    public function UserAnswershow($userId, $questionId, QuestionRepositoryInterface $QuestionRepository)
    {
        $userAnswers = $this->UserAnswerRepository->UserAnswershow($userId);
        foreach ($userAnswers as $a) {
            $choiceAnswerId = $a->answers_id;

            $choiceText = $a->label_answer;
        }
        $questionLabel = $QuestionRepository->findByLabel($questionId);
        //   dd($questionLabel);
        $goodAnswers = $QuestionRepository->findByIdCorrectAnswers($questionId);
        // dd($goodAnswers);
        foreach ($goodAnswers as  $good) {
            $goodAnswerId = $good->id;
            $textAnswer = $good->answer;
        }
        $typeQuestion = $QuestionRepository->findByType($questionId);
        return view(
            'answer.home',
            [
                'userAnswers' => $userAnswers,
                'choiceText' => $choiceText,
                'questionLabel' => $questionLabel,
                'choiceAnswerId' => $choiceAnswerId,
                'goodAnswerId' => $goodAnswerId,
                'textAnswer' => $textAnswer,
                'typeQuestion' => $typeQuestion,
                'goodAnswers' => $goodAnswers,
            ]
        );
    }
}
