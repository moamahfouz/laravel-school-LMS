<?php

namespace App\Http\Controllers\School;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Teacher;
class ClassController extends Controller
{

    protected $redirectTo = '/school/login';

    public function __construct()
    {
        $this->middleware('school.auth:school');
    }


    public function index()
    {

        //$teachers = Teacher::where('school_id', auth('school')->user()->id)->get();
        $teachers = Teacher::with('student', 'class')->get();

        //$rows = SchoolClass::where('school_id', auth('school')->user()->id)->get();
        $rows = SchoolClass::with('teacher')->where('school_id', auth('school')->user()->id)->get();

        return view('school.classes.index', compact('rows', 'teachers'));
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
            'description'              => 'required|string|max:255',
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
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
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
    public function destroy(SchoolClass $class, $id)
    {

        $class->find($id)->delete();
        return redirect()->back()->with('success', 'Class has been deleted!');

    }

}
