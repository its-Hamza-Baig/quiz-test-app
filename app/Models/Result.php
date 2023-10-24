<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'user_id',
        'obt_marks'
    ];

    public function examdata(){
        return $this->belongsTo(exam::class, 'exam_id', 'id');
    }
}
