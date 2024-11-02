<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
class ShowController extends Controller
{
    public function index()
        {
            
            $accepts = Idea::all(); // استرداد جميع الأفكار من قاعدة البيانات
            
            return view('user.pages.fund_idea', compact('accepts'));
        }
}
