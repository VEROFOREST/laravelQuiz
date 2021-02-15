<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    /**
     * The name of answer
     *
     * @var string
     */
    protected $answer = 'answer';

    /**
     * if answer is good
     *
     * @var boolean
     */
    protected $is_valid = 'isValid';
    /**
     * Get the question that owns the answer.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function useranswer()
    {
        return $this->hasmany(UserAnswer::class);
    }

}