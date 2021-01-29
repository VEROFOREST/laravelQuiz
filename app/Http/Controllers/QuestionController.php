<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use App\Repositories\QuestionRepositoryInterface;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
         
        return $this->QuestionRepository=$questionRepository;
    }

    // public function index()
    // {
    //     $allQuestions = collect ($this->QuestionRepository->all());
    //     return view('question.home', [
    //         'allQuestions' => $allQuestions,
    //         ]);

    // }

    public function quiz()
    {
        $quizes = $this->QuestionRepository->quiz();
        
        return view('question.home', [
            'quizzes' => $quizes,
        ]);
    }
}
