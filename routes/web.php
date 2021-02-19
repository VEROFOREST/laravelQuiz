<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\AnswerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.home');
});
// Route::post('user_register', [
//     'uses' => 'UserController@register'
//   ]);
 Route::Post('user.register', [UserController::class, 'register']);
// Route::get('/register', function () {
//     return view('user/home.blade.php');
// });
// Route::post('/user/home',function(){
//      return view('user/home.blade.php');
// });
Route::get('/question/{id}', [QuestionController::class, 'showQuizz']);

Route::Post('question.saveAnswer',[UserAnswerController::class, 'saveAnswer']);

Route::get('/answer', [AnswerController::class, 'showAnswer']);

