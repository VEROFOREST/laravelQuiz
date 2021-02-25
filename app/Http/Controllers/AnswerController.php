<?php

namespace App\Http\Controllers;


use App\Repositories\AnswerRepositoryInterface;
use Illuminate\Http\Request;



class AnswerController extends Controller
{
    private $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
         
        return $this->AnswerRepository = $answerRepository;
    }

    

   
}
