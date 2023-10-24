<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exams_name',
        'subject_name',
        'attempt_time',
        'total_answer',
        'date',
        'time',
    ];
    public function subjects(){
        return $this->hasMany(Subjects::class, 'id', 'subject_name');
    }
    public function questions() {
        return $this->hasMany('App\Models\Question');
    }
}
