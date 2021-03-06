<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
                            'users_id',
                            'answers_id',
                            'label_answer'];

    /**
     * get one answer for one useranswer
     */
    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answers_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
