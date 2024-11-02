<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->paginate(5);
     
        return view('admin.idea.index',compact('ideas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.idea.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        idea::create([
            'description' => $data['description'],
            'date' => $data['date'],
            'created_by' => $data['created_by'],
            'dateline' => $data['dateline'],
            'total_cost' => $data['total_cost'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            
            
        ]);

        // إعادة التوجيه إلى صفحة الفهرس مع رسالة نجاح
        return to_route('admin.idea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function show($id)
    {
        $idea = Idea::findOrFail($id); // جلب المستخدم بناءً على الـID
        return view('admin.idea.show', compact('idea')); // تمرير المستخدم إلى العرض
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     
     */
    public function edit($id)
    {
        $idea = Idea::findOrFail($id); // جلب المستخدم بناءً على الـID
        return view('admin.idea.edit', compact('idea')); // تمرير المستخدم إلى العرض
        
    }

   
    public function update(Request $request, $id)
    {
        $idea = Idea::findOrFail($id); // جلب المستخدم بناءً على الـID

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
   
           
        $idea->update($input);
     
        return redirect()->route('admin.idea.index')
                        ->with('success','idea updated successfully');
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     
     */
    public function destroy($id)
    {
        $idea = Idea::findOrFail($id); // جلب المستخدم بناءً على الـID

        $idea->delete();
      
        return redirect()->route('admin.idea.index')
                        ->with('success','Product deleted successfully');
                    }

    }
