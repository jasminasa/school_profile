<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formcontact extends Model
{
    use HasFactory;
    protected $table = 'formcontact';
    protected $fillable = ['id', 'firstname', 'lastname', 'email', 'subject', 'massage'];
}
