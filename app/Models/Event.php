<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $fillable = ['id', 'title', 'description', 'startdate', 'enddate', 'starttime', 'endtime', 'theme', 'location', 'map', 'image'];
}
