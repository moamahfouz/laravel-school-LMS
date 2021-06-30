<?php

namespace App\Http\Controllers\Teacher;
use App\Models\Mark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarkController extends Controller
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

        $previous = Mark::where('student_id', request('student_id'))->first();
        if ($previous === null) {
            Mark::create([
                'student_id'=> $request->student_id,
                'class_id'=> $request->class_id,
                'school_id'=> auth('teacher')->user()->school_id,
                'first'=> ($request->first) ? $request->first : null,
                'mid'=> ($request->mid) ? $request->mid : null,
                'final'=> ($request->final) ? $request->final : null,
            ]);
        }else{
            Mark::where('student_id', $request->student_id)->update([
                'first'=> ($request->first != null) ? $request->first : null,
                'mid'=> ($request->mid != null) ? $request->mid : null,
                'final'=> ($request->final != null) ? $request->final : null,
            ]);
        }





        return redirect()->back()->with('success', 'Marks has been added to this student');
    }




}
