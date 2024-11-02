<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = [
    'description',
    'date' ,
    'created_by' ,
    'dateline' ,
    'total_cost' ,
    'email' ,
    'phone' ,
    'status' ,
    ];
}
