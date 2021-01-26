<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
     /**
     * The type of answer for a question.
     *
     * @var string
     */
    protected $type = 'type';
    /**
     * Get the questions for the type.
     */
    public function questions()
    {
        return $this->hasMany(question::class);
    }

        
}
