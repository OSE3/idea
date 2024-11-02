<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 use \App\Models\reject;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin.adminHome');
    }
    public function dashboard()
    {
        // جلب العدد الفعلي لكل عنصر
        $totalRequests = \App\Models\Idea::count(); // افترض أن جدول الطلبات هو 'requests'
        $rejectedRequests = reject::where('status', 'rejected')->count(); // الطلبات المرفوضة
        $totalUsers = \App\Models\User::count(); // عدد المستخدمين
        $acceptedRequests = \App\Models\Accept::count(); // افترض أن جدول الاستحقاقات هو 'entitlements'
        $selectedRequests= \App\Models\Reservation::count();
        // تمرير البيانات إلى الواجهة
        return view('admin.adminHome', compact('totalRequests', 'rejectedRequests', 'totalUsers', 'acceptedRequests','selectedRequests'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('manage.managHome');
    }
}