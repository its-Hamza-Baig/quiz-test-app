<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable =[
        'class',
        'user_id'
    ];

    public function userId(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function subjects(){
        return $this->hasMany(Subjects::class, 'class_id', 'id');
    }
}
