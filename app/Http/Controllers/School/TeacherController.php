<?php

namespace App\Http\Controllers\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Teacher;
class TeacherController extends Controller
{

    protected $redirectTo = '/school/login';

    public function __construct()
    {
        $this->middleware('school.auth:school');
    }


    public function index()
    {
        $rows = Teacher::where('school_id', auth('school')->user()->id)->latest()->get();

        return view('school.teachers.index', compact('rows'));
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
            'email'             => 'required|string|email|max:255|unique:teachers',
            'password'          => 'required|string|min:8',
        ]);


        if ($request->hasFile('profile_picture')) {
            $profile = 'te-'.time().'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/teachers'), $profile);
        } else {
            $profile = 'avatar.png';
        }

        Teacher::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'school_id'=> auth('school')->user()->id,
            'password'  => bcrypt($request->password),
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'address'   => $request->address,
            'profile_picture' => $profile
        ]);


        return redirect()->back()->with('success', 'Teacher has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Teacher::findOrFail($id);

        return view('school.teachers.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required',
        ]);


        Teacher::where('id', $id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'address'   => $request->address,
        ]);

        return redirect(route('schoolTeacher.teachers.index'))->with('success', 'Teacher has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher, $id)
    {
      $row = $teacher->find($id);
        if($row->profile_picture != 'avatar.png') {
            $image_path = public_path() . '/images/teachers/' . $row->profile_picture;
            if (is_file($image_path) && file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $row->delete();

        return redirect()->back()->with('success', 'Teacher has been deleted!');
    }

}
