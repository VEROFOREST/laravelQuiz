<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

use App\Models\UserAnswer;
use App\Models\Answer;
use App\Models\Question;




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

        foreach ($arrayChecked as $answerChecked) {
            $userId = $request->userHidden;
            $questionLabel = $request->questionHidden;


            $questionId = $request->idHidden;

            if (intval($answerChecked) === 0) {
                $input = ['users_id' => $userId, 'answers_id' => null, 'label_answer' => $arrayChecked[0]];
            } else {
                $input = ['users_id' => $userId, 'answers_id' => $answerChecked];
            }
        }
        $this->UserAnswerRepository->saveAnswer($input);

        $userAnswers = UserAnswer::with('User')->where('users_id', $userId)->get();
        dd($userAnswers);

        foreach ($userAnswers as $a) {
            $choiceAnswerId = $a->answers_id; {
                $choiceText = $a->label_answer;
            }
            $choiceAnswers = Answer::with('Question')->where('id', $choiceAnswerId)->get();
        }
        $goodAnswers = Question::find($questionId)->answers->where('isValid', 1);
        foreach ($goodAnswers as $good) {
            $goodAnswerId = $good->id;
            $textAnswer = $good->answer;
        }
        $typeQuestion = Question::find($questionId)->type;

        return view(
            'answer.home',
            [
                'questionId' => $questionId,
                'questionLabel' => $questionLabel,
                'userAnswers' => $userAnswers,
                'ChoiceAnswers' => $choiceAnswers,
                'goodAnswers' => $goodAnswers,
                'choiceText' => $choiceText,
                'typeQuestion'=>$typeQuestion,
                'goodAnswerId' => $goodAnswerId,
                'choiceAnswerId' => $choiceAnswerId,
                'textAnswer' => $textAnswer,

            ]
        );
    }
}
