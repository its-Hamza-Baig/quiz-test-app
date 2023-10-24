<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'class_id',
    ];
    public function className(){
        return $this->belongsTo(Classes::class, 'id', 'class_id');
    }

    public function exams(){
        return $this->hasMany(exam::class, 'id', 'subject_name');
    }
}   
