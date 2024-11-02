<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
     
        return view('profile.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
  
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
       User::create($input);
      
        return redirect()->route('profile.index')
                        ->with('success','user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function show($id)
    {
        $user = User::findOrFail($id); // جلب المستخدم بناءً على الـID
        return view('profile.show', compact('user')); // تمرير المستخدم إلى العرض
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // جلب المستخدم بناءً على الـID
        return view('profile.edit', compact('user')); // تمرير المستخدم إلى العرض
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
   
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // جلب المستخدم بناءً على الـID

        $request->validate([
            'name' => 'required',
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
           
        $user->update($input);
     
        return redirect()->route('profile.index')
                        ->with('success','user updated successfully');
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); // جلب المستخدم بناءً على الـID

        $user->delete();
      
        return redirect()->route('profile.index')
                        ->with('success','Product deleted successfully');
                    }
    }

