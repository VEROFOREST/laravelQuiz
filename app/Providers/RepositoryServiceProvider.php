<?php

namespace App\Providers;

use App\Repositories\QuestionRepository;
use App\Repositories\QuestionRepositoryInterface;
use App\Repositories\UserAnswerRepositoryInterface;
use App\Repositories\UserRepositoryInterface; 
use App\Repositories\UserRepository; 
use Illuminate\Support\ServiceProvider; 
use App\Repositories\UserAnswerRepository;
use App\Repositories\AnswerRepository;
use App\Repositories\AnswerRepositoryInterface;



/** 
* Class RepositoryServiceProvider 
* @package App\Providers 
*/

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
          $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class); 
       $this->app->bind(UserAnswerRepositoryInterface::class, UserAnswerRepository::class); 
       $this->app->bind(AnswerRepositoryInterface::class, AnswerRepository::class); 
     
    }


    

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       
     }   
}
