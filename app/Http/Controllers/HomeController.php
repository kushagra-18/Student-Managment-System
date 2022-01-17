<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function check(){
    $role = Auth::user()->role;
            if ($role == 3) {
                return view('admin.home');
            } else if($role ==2 ) {
                return view('teacher.home');
            }
            else if($role ==1) {
                return view('student.details');
            }
            else{
                return view('home');
            }
        }
}