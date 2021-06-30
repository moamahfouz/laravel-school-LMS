<?php

namespace App\Http\Controllers\Teacher;
use App\Models\StudentClass;
use App\Models\Task;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Teacher;

class ClassController extends Controller
{

    protected $redirectTo = '/teacher/login';

    public function __construct()
    {
        $this->middleware('teacher.auth:teacher');
    }


    public function index()
    {
        $rows = SchoolClass::where('teacher_id', auth('teacher')->user()->id)->get();

        return view('teacher.classes.index', compact('rows', ));
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
            'description'       => 'required|string|max:255',
        ]);

        SchoolClass::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'teacher_id'=>$request->teacher_id,
            'school_id'=>auth('school')->user()->id,
        ]);


        return redirect()->back()->with('success', 'Class has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = SchoolClass::where(['id'=>$id,'teacher_id'=> auth('teacher')->user()->id])->first();

        //$classStudents = Student::where(['teacher_id'=> auth('teacher')->user()->id, 'class_id'=>$row->id])->get();
        $classStudents = StudentClass::with('student', 'class')->where('class_id', $id)->get();

        $tasks = Task::where(['teacher_id'=> auth('teacher')->user()->id, 'class_id'=>$id])->get();

        return view('teacher.classes.show', compact('row','classStudents', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.$teacher->user_id,
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required|date',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($teacher->user_id);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name).'-'.$user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $user->profile_picture;
        }

        $user->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        $user->teacher()->update([
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $user = User::findOrFail($teacher->user_id);

        $user->teacher()->delete();

        $user->removeRole('Teacher');

        if ($user->delete()) {
            if($user->profile_picture != 'avatar.png') {
                $image_path = public_path() . '/images/profile/' . $user->profile_picture;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        return back();
    }

}
