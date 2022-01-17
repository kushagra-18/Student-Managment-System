<?php

namespace App\Http\Controllers;
use App\Teachers;
use Validator;
use DB;
use App\User;
use Illuminate\Http\Request;

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
        $teacher=Teachers::all();
        return view('Teacher',['teachers'=>$teacher,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeT(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Tid'=>'required',
            'email' => 'required|email|unique',
            'name'=>'required', 
            'number'=>'required|[789][0-9]{9}'
        ]);
        $teacher=new Teachers();
        $teacher->Tid=$request->input('Tid');
        $teacher->name=$request->input('name');
        // $teacher->email=$request->input('email');
        $teacher->number=$request->input('number');
        $teacher->designation=$request->input('designation');
        $teacher->speciality=$request->input('speciality');
        $teacher->save();

        $user=new User();
        $user->id=$request->input('Tid');
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password = bcrypt('secret');
        $user->role=2;
        $user->save();
        return redirect('/home');
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
        return view('teacher',['teacher'=>$teacher,'layout'=>'edit']);
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
