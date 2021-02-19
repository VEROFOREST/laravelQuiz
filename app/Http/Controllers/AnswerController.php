<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepository;
use App\Repositories\AnswerRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\UserAnswer;


class AnswerController extends Controller
{
    private $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
         
        return $this->AnswerRepository = $answerRepository;
    }

    

   public function showAnswer(Request $request )
    {
        $idAnswer = $request->route('idAnswer');
        $idUser = $request->route('userId');
        
        $allAnswers = UserAnswer::with('User')->where('users_id',$idUser)->get();
        // dd($allAnswers);
        // foreach ($allAns pwers as $a){
            
        //    $choiceAnswerId = $a->answers_id;
        //    $choiceAnswers = $answers = Answer::with('Question')->where('id',$choiceAnswerId)->get();
        // //    dd($choiceAnswers);
           
        // }
        
        $answers = Answer::with('Question')->where('id',$idAnswer)->get();
        foreach ($answers as $answer)
        {
        $question_id = $answer->question->id;
        $goodAnswers=Question::find($question_id)->answers->where('isValid',1);
        
        }

        return view('answer.home', 
        [
            'answer' => $answer ,
            'goodAnswers'=>$goodAnswers,
        
            
            'allAnswers'=>$allAnswers,
            
        ]);
           

       
        
      
        
    }
}
