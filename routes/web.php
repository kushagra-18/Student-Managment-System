<?php
use App\Student;
use App\Teachers;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home','HomeController@index')->name('home');

Route::get('/home',"HomeController@check");
//Students
Route::get('/createStudent',"StudentController@create");
Route::post('/store',"StudentController@store");
Route::get('/viewStudent','StudentController@index');
Route::get('/edit/{Sid}',"StudentController@edit");
Route::post('/updateS/{Sid}',"StudentController@update");
Route::get('/deleteS/{Sid}',"StudentController@destroy");
Route::get('/viewStudentList','StudentController@indexStudent');
Route::get('/viewCourseList','CourseController@indexCourse');


//Teachers
Route::get('/createTeacher',"TeacherController@create");
Route::post('/storeT',"TeacherController@storeT");
Route::get('/viewTeacher','TeacherController@index');
Route::get('/editT/{Tid}',"TeacherController@edit");
Route::post('/updateT/{Tid}',"TeacherController@updateT");
Route::post('/deleteT/{Tid}',"TeacherController@destroy");
 

//Courses
Route::get('/createCourse',"CourseController@createC");
Route::post('/storeC',"CourseController@storeC");
Route::get('/viewCourse','CourseController@index');
Route::get('/editC/{Cid}',"CourseController@edit");
Route::post('/updateC/{Cid}',"CourseController@update");

//Admin
Route::get('/createAdmin',"AdminController@create");
Route::post('/storeA',"AdminController@store");
Route::get('/viewAdmin','AdminController@index');
Route::get('/editA/{adminId}',"AdminController@edit");
Route::post('/updateA/{adminId}',"AdminController@update");
Route::post('/deleteA/{adminId}',"AdminController@destroy");

//extra
// Route::get('/admin/home', 'HomeController@index');
// Route::get('/student/home', 'HomeController@student_index');
// Route::get('/teacher/home', 'HomeController@teacher_index');


Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $student = Student::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($student) > 0)
        return view('searchResult')->withDetails($student)->withQuery ( $q );
    else return view ('searchResult')->withMessage('No Details found. Try to search again !');
});
Route::any('/searchTeacher',function(){
    $q = Input::get ( 'q' );
    $teacher = Teachers::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($teacher) > 0)
        return view('search.TeacherResult')->withDetails($teacher)->withQuery ( $q );
    else return view ('search.TeacherResult')->withMessage('No Details found. Try to search again !');
});