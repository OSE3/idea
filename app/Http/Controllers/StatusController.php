<?php

namespace App\Http\Controllers;

use App\Models\Reject;
use Illuminate\Http\Request;
use PDF;
class StatusController extends Controller
{
    public function showStatusForm()
    {
        return view('user.pages.state');
    }

    // التحقق من حالة الطلب باستخدام رقم الهاتف
    public function checkStatus(Request $request)
    {
        $phone = $request->input('phone');
    
        // البحث عن الطلب في الجدول الأول
        $order = Reject::where('phone', $phone)->first();
    
        // إذا لم يتم العثور على الطلب في الجدول الأول، البحث في الجدول الثاني
        if (!$order) {
            $order = Reject::where('phone', $phone)->first();
        }
    
        // إذا تم العثور على الطلب، عرض البيانات
        if ($order) {
            return view('user.pages.state', ['order' => $order]);
        } else {
            // إذا لم يتم العثور على أي طلب
            return view('user.pages.state', ['notFound' => 'الرقم الذي ادخلته غير صحيح او ان الرقم قيد المراجعة']);
        }
    }
    
}
