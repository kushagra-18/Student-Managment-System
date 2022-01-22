<?php

namespace App\Http\Controllers;
use App\Student;
use Validator;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student1 = new Student();
        $students=$student1->display();
        return view('student.index',compact('students'));
    }
    public function indexStudent()
    {
        $students = DB::table('students')
        ->leftJoin('users', 'students.Sid', '=', 'users.id')
        ->paginate(2);
        
        return view('student.StudentList',['students'=>$students,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = DB::table('courses')->pluck("name","Cid");
        return view('student',compact('course'),['layout'=>'create']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'Sid' => 'required',
            'email' => 'required|email', 
            'name' => 'required|min:4', 
            'number' => 'required', 
            'address' => 'required',
            'class' => 'required', 
            'birth' => 'required',
            'course_id' => 'required',
            'mentor' => 'required',
        ]);
        
        $student1 = new Student();
        $students = $student1->store_data($request);
        $student_id =Auth::User()->id;
        error_log($student_id);
        $user=new User();
        $user->id=$request->input('Sid');
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password = bcrypt('secret');
        $user->role=1;
        $user->save();
        $user_id =Auth::User()->id;
        error_log($user_id);
        //return redirect()->route('admin.home')->with('message','New Student Created Successfull !');
        
        return view('admin.home')->with('message','Student created successfully');
        
       // return redirect('/admin/home');
        
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Sid)
    {
        $student=Student::find($Sid);
        $student=Student::all();
        return view('student',['students'=>$student,'student'=>$student,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Sid)
    {
        $student=Student::find($Sid);

        return view('studentEditDetails',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Sid)
    {
        
        $student=Student::find($Sid);
        $student->name=$request->input('name');
        $student->number=$request->input('number');
        $student->birth=$request->input('birth');
        $student->class=$request->input('class');
        $student->address=$request->input('address');
        $student->course=$request->input('course');
        $student->mentor=$request->input('mentor');
        $student->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::find($id);  
        $student->delete();  
        $user1=User::find($id);  
        $user1->delete();  
        return redirect('/home');
        
    }
}
