<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = 'config';
    protected $fillable = ['id', 'title', 'favicon', 'logo', 'metadata', 'map', 'fb', 'ig', 'yt', 'pin', 'twit'];
}
