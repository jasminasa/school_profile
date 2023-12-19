<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Why extends Model
{
    use HasFactory;
    protected $table = 'why';
    protected $fillable = ['id', 'title', 'description', 'year', 'student', 'successstudent', 'educator'];
}
