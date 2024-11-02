<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
    protected $fillable = [
        'idea_id',
        'amount',
        // أضف أي أعمدة إضافية حسب الحاجة
    ];
}
