<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class FormController extends Controller
{
    // دالة لعرض صفحة إضافة فكرة
    public function create()
    {
        return view('user.pages.form');
    }

    // دالة لتخزين الفكرة في قاعدة البيانات
    public function store(Request $request)
    {
        // تحقق من صحة البيانات المدخلة
        $request->validate([
            'description' => 'required|string',
            'date' => 'required|date',
            'created_by' => 'required|string',
            'dateline' => 'required|string',
            'total_cost' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        // إنشاء الفكرة وتخزينها في قاعدة البيانات
        Idea::create($request->all());

        // إعادة توجيه المستخدم مع رسالة نجاح
        return redirect()->route('user.pages.form')->with('success', 'تمت إضافة الفكرة بنجاح!');
    }
}
