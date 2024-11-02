<?php

namespace App\Http\Controllers;
use App\Models\Reject;
use App\Models\Idea;
use Illuminate\Http\Request;

class RejectController extends Controller
{
    public function index() {
        $rejects = Reject::latest()->paginate(5);
     
        return view('admin.reject.index',compact('rejects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function show($id) {
     
        $rejects = Reject::findOrFail($id);
        return view('admin.reject.index', compact('rejects'));
    }
        public function edit($id)
        {
            // جلب السجل بناءً على المعرف
            $reject = Reject::find($id);
            
            // التحقق مما إذا كان السجل موجودًا
            if (!$reject) {
                return redirect()->back()->withErrors('السجل غير موجود.');
            }
        
            // تمرير السجل إلى الـ view
            return view('admin.reject.edit', ['reject' => $reject]);
        }

public function update($id){
$data=request()->all();

$reject_reason=request()->reject_reason;

$reject = Reject::findOrFail($id);
     $reject->update([
         
         'reject_reason' => $reject_reason,
     ]);
return to_route('admin.reject.index');
}

public function store(Request $request)
    {
        $idea = idea::find($request->id);
        if ($idea) {
            // إنشاء سجل جديد في جدول Entitlement باستخدام بيانات الطلب
            Reject::create([
            'id' => $idea->id,
            'description' => $idea->description,
            'date' => $idea->date,
            'created_by' => $idea->created_by,
            'dateline' => $idea->dateline,
            'total_cost' => $idea->total_cost,
            'email' => $idea->email,
            'phone' => $idea->phone,
           'status'=>'مرفوض',
           'reject_reason'=>'',
            ]);
          
            return redirect()->back()->with('success', 'تم نقل الطلب بنجاح!');
        } else {
            return redirect()->back()->with('error', 'لم يتم العثور على الطلب.');
        }
       
     
   
    }
    public function destroy($id)
    {
        $accept = Reject::findOrFail($id); // جلب المستخدم بناءً على الـID

        $accept->delete();
      
        return redirect()->route('admin.accept.index')
                        ->with('success','idea deleted successfully');
                    }
}
