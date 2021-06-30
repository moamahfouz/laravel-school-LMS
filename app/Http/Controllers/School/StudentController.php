<?php

namespace App\Http\Controllers\School;
use App\Models\StudentClass;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Student;
class StudentController extends Controller
{

    protected $redirectTo = '/school/login';

    public function __construct()
    {
        $this->middleware('school.auth:school');
    }


    public function index()
    {
        $teachers = Teacher::where('school_id', auth('school')->user()->id)->get();
        $rows = Student::where('school_id', auth('school')->user()->id)->orderBy('id','desc')->get();
        return view('school.students.index', compact('rows', 'teachers'));
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
            'email'             => 'required|string|email|max:255|unique:students',
            'password'          => 'required|string|min:8',
        ]);


        if ($request->hasFile('profile_picture')) {
            $profile = 'te-'.time().'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/students'), $profile);
        } else {
            $profile = 'avatar.png';
        }

        $student = Student::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'school_id'=> auth('school')->user()->id,
            'teacher_id'=> $request->teacher_id,
            'password'  => bcrypt($request->password),
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'address'   => $request->address,
            'profile_picture' => $profile
        ]);

        // looping though class ids
        $classIds = $request->class_ids;

        for($i=0; $i<count($classIds); $i++){
            StudentClass::create([
                'student_id'=>$student->id,
                'class_id'=>$classIds[$i],
                'school_id'=>auth('school')->user()->id,
        ]);
        }



        return redirect()->back()->with('success', 'Student has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $teacher = Teacher::with('user')->findOrFail($teacher->id);

        return view('backend.teachers.edit', compact('teacher'));
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
    public function destroy(Student $student, $id)
    {

        $row = $student->find($id);
        if($row->profile_picture != 'avatar.png') {
            $image_path = public_path() . '/images/students/' . $row->profile_picture;
            if (is_file($image_path) && file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $row->delete();

        return redirect()->back()->with('success', 'Student has been deleted!');

    }

}
