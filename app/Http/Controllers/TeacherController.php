<?php

namespace App\Http\Controllers;
use App\Teachers;
use Validator;
use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = Trainingnew::table('teachers')->leftJoin('users', 'users.id', '=', 'teachers.=Tid')->get();
        $teachers = DB::table('teachers')
        ->leftJoin('users', 'teachers.Tid', '=', 'users.id')
        ->paginate(2);
        #$teacher = Teachers::all();  
 
        return view('Teacherlist', compact('teachers')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = DB::table('courses')->pluck("name","Cid");
        return view('Teacher',compact('course'),['layout'=>'create']);
        // $teacher=Teachers::all();
        // return view('Teacher',['teachers'=>$teacher,'layout'=>'create']);
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
            'Tid' => 'required',
            'email' => 'required|email', 
            'name' => 'required|min:4', 
            'number' => 'required', 
            'speciality' => 'required', 

        ]);
        $teacher=new Teachers();
        $teacher->Tid=$request->input('Tid');
        $teacher->name=$request->input('name');
        // $teacher->email=$request->input('email');
        $teacher->number=$request->input('number');
        $teacher->designation=$request->input('designation');
        $teacher->course_id=$request->input('course_id');
        $teacher->speciality=$request->input('speciality');
        $teacher->save();

        $user1=new User();
        $user1->id=$request->input('Tid');
        $user1->name=$request->input('name');
        $user1->email=$request->input('email');
        $user1->password = bcrypt('secret');
        $user1->role=2;
        $user1->save();
        return view('admin.home')->with('message','Student created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Tid)
    {
        $teacher=Teachers::find($Tid);
        //$students=Student::all();
        return view('teacherEditDetails',['teacher'=>$teacher,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateT(Request $request, $Tid)
    {
        $teacher=Teachers::find($Tid);
        $teacher->name=$request->input('name');
        $teacher->number=$request->input('number');
        $teacher->designation=$request->input('designation');
        $teacher->speciality=$request->input('speciality');
        $teacher->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Tid)
    {
        $teacher=Teachers::find($Tid);  
        $teacher->delete();  
        return redirect('/home');
    }
}
