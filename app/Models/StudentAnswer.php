<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;
    public $table = "student_answers";
    protected $fillable = [
        'user_id',
        'exam_id',
        'question_id',
        'answer_id',

    ];

}
