<?php

namespace App\Http\Controllers;
use App\Models\Mark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
class AsynController extends Controller
{

    public function getClassesOFTeacher(Request $request){
        $rows = SchoolClass::where('teacher_id', $request->teacher_id)->get();
        return response()->json($rows);
    }

    public function getMarksPerStudent(Request $request){
        $rows = Mark::where('student_id', $request->id)->first();
        return response()->json($rows);
    }


}
