<?php
namespace App\Http\Controllers;
use App\Admin;
use App\User;
use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $admins = DB::table('admins')
        ->leftJoin('users', 'admins.adminId', '=', 'users.id')->paginate(2);
 
        return view('admin.index', compact('admins'));  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'Name'=>'required',
            'Email' => 'required|email']);
        $student4 =Auth::User()->name;
        error_log($student4);
        $admin=new Admin();
        $admin->adminId=$request->input('adminId');
        $admin->Name=$request->input('Name');
        // $admin->Email=$request->input('Email');
        $admin->number=$request->input('number');
        $admin->Address=$request->input('Address');
        $admin->save();
        $student3 =Auth::User()->name;
        error_log($student3);

         $user=new User();
        $user->id=$request->input('adminId');
        $user->name=$request->input('Name');
        $user->email=$request->input('Email');
        $user->password = bcrypt('secret');
        $user->role=3;
        $user->save();
        $student_id =Auth::User()->name;
        error_log($student_id);
        return view('admin.home');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user= Auth::user();
        $students = DB::table('students')
        ->leftJoin('users', 'students.Sid', '=', 'users.id')
        ->paginate(2);
        $details= Admin::find($user);
        
        // $details= Admin::find($id);
        return view('admin.showDetails', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $admins = DB::table('admins')
        ->leftJoin('users', 'admins.adminId', '=', 'users.id')->get();
 
        // $admin= Admin::find($id);  
        return view('admin.edit', compact('admins'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adminid)
    {
        $admin= Admin::find($adminid);  
        $admin->Name=$request->input('Name');
        $admin->Email=$request->input('Email');
        $admin->number=$request->input('number');
        $admin->Address=$request->input('Address');
        $admin->save();
   
        // $user=User::find();
        // $user->Name=$request->input('Name');
        // $user->Email=$request->input('Email');
        // $user->password = bcrypt('secret');
        // $user->role=0;
        // $user->save();
       return redirect('/home');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($adminid)
    {
        $admin=Admin::find($adminid);  
        $admin->delete();  
        return redirect('/home');
    }
}