<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reject extends Model
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
        'reject_reason',
        ];
}
