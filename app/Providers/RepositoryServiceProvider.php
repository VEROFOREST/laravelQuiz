<?php

namespace App\Providers;

use App\Repositories\QuestionRepository;
use App\Repositories\QuestionRepositoryInterface;
use App\Repositories\UserRepositoryInterface; 
use App\Repositories\UserRepository; 
use Illuminate\Support\ServiceProvider; 

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
