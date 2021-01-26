<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;
    /**
     * get one answer for one useranswer
     */
    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
