<?php

namespace App\Http\Controllers;
use App\Student;
use Validator;
use App\User;
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
        $students=Student::paginate(1);
        return view('student',['students'=>$students,'layout'=>'index']);
    }
    public function indexStudent()
    {
        $students=Student::all();
        return view('student.StudentList',['students'=>$students,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students=Student::all();
        return view('student',['students'=>$students,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $rules = array(
        //     'name'=>'required',                      
        //     'email'=>'required'|'email'|'unique:students', 
        //     'password'=>'required',
        //     'number'=>'required'|'digits = 10'

        // ); $this->validate($request, [ 'email' => 'required|email',
        // ]);
        // $validator = Validator::make($request::all(), $rules);
        // if ($validator->fails()) {

        //     // get the error messages from the validator
        //     $messages = $validator->messages();
    
        //     // redirect our user back to the form with the errors from the validator
        //     return Redirect::to('/admin/home')->withErrors($validator);
        // }
        // else{
        $student=new Student();
        $student->Sid=$request->input('Sid');
        $student->name=$request->input('name');
        // $student->email=$request->input('email');
        $student->number=$request->input('number');
        $student->birth=$request->input('birth');
        $student->class=$request->input('class');
        $student->address=$request->input('address');
        $student->course=$request->input('course');
        $student->mentor=$request->input('mentor');
        $student->save();

        $user=new User();
        $user->id=$request->input('Sid');
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password = bcrypt('secret');
        $user->role=1;
        $user->save();
        //return redirect()->route('admin.home')->with('message','New Student Created Successfull !');
        return redirect('/admin/home')->with('success','Student created successfully');
        
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
        return redirect('/home');
    }
}
