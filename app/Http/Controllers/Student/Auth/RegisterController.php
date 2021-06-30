<?php

namespace App\Http\Controllers\Student\Auth;

use App\Models\StudentClass;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new admins as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/student';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.guest:student');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:students',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Student
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'school_id'              => 'required',
            'email'             => 'required|string|email|max:255|unique:students',
            'password'          => 'required|string|min:8',
        ]);

        $student = Student::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'school_id'=> $request->school_id,
            'password'  => bcrypt($request->password),
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'profile_picture' => 'avatar.png'
        ]);

        // looping though class ids
        $classIds = $request->class_ids;

        for($i=0; $i<count($classIds); $i++){
            StudentClass::create([
                'student_id'=>$student->id,
                'class_id'=>$classIds[$i],
                'school_id'=> $request->school_id,
            ]);
        }



        return redirect('/student/login')->with(['email'=>$request->email,'password'=>$request->password]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('student.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('student');
    }

}
