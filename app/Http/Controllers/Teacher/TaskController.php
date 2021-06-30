<?php

namespace App\Http\Controllers\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;


class TaskController extends Controller
{

    protected $redirectTo = '/teacher/login';

    public function __construct()
    {
        $this->middleware('teacher.auth:teacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'class_id'       => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file = 'file-'.time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/files'), $file);
        } else {
            $file = null;
        }

        Task::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'class_id'=>$request->class_id,
            'teacher_id'=>auth('teacher')->user()->id,
            'end_date'=>$request->end_date,
            'file'=>$file
        ]);


        return redirect()->back()->with('success', 'Class has been created');
    }




}
