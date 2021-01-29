<?php

namespace App\Providers;

use App\Repositories\QuestionRepository;
use App\Repositories\QuestionRepositoryInterface;
use App\Repository\UserRepositoryInterface; 
use App\Repository\Eloquent\UserRepository; 
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
        
     
    }


    

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
     }   
}
