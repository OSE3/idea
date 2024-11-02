<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;

class SelectedController extends Controller
{
    public function index()
    {
        // جلب جميع البيانات من نموذج الأفكار أو أي نموذج ذي صلة
        $selects = Reservation::all(); // استبدل Select بنموذج الفكرة لديك
        
        // تمرير البيانات إلى الـ View
        return view('admin.select.index', compact('selects'))->with('i', 0);
    }
    public function destroy($id)
    {
        $select = Reservation::findOrFail($id); // جلب المستخدم بناءً على الـID

        $select->delete();
      
        return redirect()->route('admin.select.index')
                        ->with('success','idea deleted successfully');
                    }
                    public function show($id)
{
    $selects = Reservation::select('id', 'idea_id', 'reserved_by')->get();
  
    
 
    $user = auth()->check() ? auth()->user() : null; // الحصول على المستخدم الحالي أو null إذا لم يكن مسجلاً

    return view('admin.select.show', compact('selects', 'user')); // تمرير الفكرة والمستخدم إلى العرض
}
}
