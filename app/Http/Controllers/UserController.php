<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;


class UserController extends Controller
{
    public function index()
    {
        $users = DB::select('SELECT * FROM users'); 
        return view('users.index')->with('users',$users);
    }
   
    public function destroy($id)
    {
        DB::delete('DELETE FROM users WHERE id = ?', [$id]);
        echo "User deleted successfully!";
        echo '<a href = "/delete-user"> Click Here </a> to go back';


    }
}
