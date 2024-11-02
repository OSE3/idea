<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accept;
use App\Models\idea;
class AcceptController extends Controller
{
   
    public function index()
    {
        $accepts = Accept::latest()->paginate(5);
     
        return view('admin.accept.index',compact('accepts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.accept.create');
    }

    public function store(Request $request)
    {
        $idea = idea::find($request->id);
        if ($idea) {
            // إنشاء سجل جديد في جدول Entitlement باستخدام بيانات الطلب
            Accept::create([
            'id' => $idea->id,
            'description' => $idea->description,
            'date' => $idea->date,
            'created_by' => $idea->created_by,
            'dateline' => $idea->dateline,
            'total_cost' => $idea->total_cost,
            'email' => $idea->email,
            'phone' => $idea->phone,
           'status'=>'مقبول',
            ]);
          
            return redirect()->back()->with('success', 'تم نقل الطلب بنجاح!');
        } else {
            return redirect()->back()->with('error', 'لم يتم العثور على الطلب.');
        }
       
     
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function show($id)
    {
        $accept = Accept::findOrFail($id); // جلب المستخدم بناءً على الـID
        return view('admin.accept.show', compact('accept')); // تمرير المستخدم إلى العرض
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     
     */
    public function edit($id)
    {
        $accept = Accept::findOrFail($id); // جلب المستخدم بناءً على الـID
        return view('admin.accept.edit', compact('accept')); // تمرير المستخدم إلى العرض
        
    }

   
    public function update(Request $request, $id)
    {
        $accept = Accept::findOrFail($id); // جلب المستخدم بناءً على الـID

        $request->validate([
            'description' => 'required',
            'date' => 'required',
            'created_by' => 'required',
            'dateline' => 'required',
            'total_cost' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();    
        $accept->update($input);
        return redirect()->route('admin.accept.index')
                        ->with('success','idea_accept updated successfully');
    }
        public function destroy($id)
    {
        $accept = Accept::findOrFail($id); // جلب المستخدم بناءً على الـID

        $accept->delete();
      
        return redirect()->route('admin.accept.index')
                        ->with('success','Product deleted successfully');
                    }

}
