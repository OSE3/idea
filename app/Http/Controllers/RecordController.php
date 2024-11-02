<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use App\Models\Accept;
use App\Models\Reject;
use App\Models\Reservation;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function idea()
    {
        $ideas = Idea::latest()->paginate(5);
     
        return view('admin.record.idea',compact('ideas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function accept()
    {
        $accepts = Accept::latest()->paginate(5);
     
        return view('admin.record.accept',compact('accepts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    } 
    public function select()
    {
        $selects = Reservation::latest()->paginate(5);
     
        return view('admin.record.select',compact('selects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function reject()
    {
        $rejects = Reject::latest()->paginate(5);
     
        return view('admin.record.reject',compact('rejects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
