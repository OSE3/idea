<?php
namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Accept; // تأكد من استيراد نموذج Funding
use Illuminate\Http\Request;

class FundingController extends Controller
{
    public function index()
        {
            
            $accepts = Accept::all(); // استرداد جميع الأفكار من قاعدة البيانات
            
            return view('user.pages.fund_idea', compact('accepts'));
        }
        public function fundingPayPal($id)
        {
            $accept = Accept::findOrFail($id); // جلب المستخدم بناءً على الـID
            return view('user.pages.funding_paypal', compact('accept')); // تمرير المستخدم إلى العرض
            
        }

public function reserveIdea($id)
{
    $idea = Accept::find($id); // افترض أن لديك نموذج Idea
    $existingReservation = Reservation::where('idea_id', $id)->first();

    if ($existingReservation) {
        return response()->json(['message' => 'الفكرة محجوزة مسبقًا'], 400);
    }

    // إنشاء حجز جديد
    Reservation::create([
        'idea_id' => $id,
        'reserved_by' => auth()->user()->name, // أو استخدم ما يناسبك
    ]);

    return response()->json(['message' => 'تم حجز الفكرة بنجاح']);
}
public function show_user($id)
{
    $accept = Reservation::findOrFail($id); // جلب الفكرة بناءً على الـID
    $user = auth()->check() ? auth()->user() : null; // الحصول على المستخدم الحالي أو null إذا لم يكن مسجلاً

    return view('user.pages.funding_paypal', compact('accept', 'user')); // تمرير الفكرة والمستخدم إلى العرض
}



}
