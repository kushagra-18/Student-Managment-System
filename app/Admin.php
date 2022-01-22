<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey = 'adminId';
    public $incrementing = false;


    /**
     * Returns the details of student etc after searching
     * search by users.name in users table
     */
    public function search($search)
    {


        $student = DB::table('users')
        ->Join('students', 'students.Sid', '=', 'users.id')
        ->where('users.name', 'LIKE', '%' . $search . '%')
        ->get();

        //TODO: Pagination

        return $student;
    }
}
