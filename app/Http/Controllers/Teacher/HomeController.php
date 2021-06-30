<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Student;
use App\Teacher;
use App\Models\Task;

class HomeController extends Controller
{

    protected $redirectTo = '/teacher/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('teacher.auth:teacher');
    }

    /**
     * Show the School dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $classes = SchoolClass::where('teacher_id', auth('teacher')->user()->id)->get();
        $tasks = Task::where('teacher_id', auth('teacher')->user()->id)->get();

        return view('teacher.home', compact( 'classes', 'tasks'));
    }

}
