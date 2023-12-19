<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = 'major';
    // protected $fillable = ['id', 'title', 'desc', 'overview', 'Competention', 'Certification', 'student', 'successstudent', 'educator','image'];
    protected $guarded = [];
}
