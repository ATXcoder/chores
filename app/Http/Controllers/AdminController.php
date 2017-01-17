<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    //
    public function choreAssignment()
    {
        $users = User::all()->where('is_admin','=',0);
        return view('chores.assign')->with('data',$users);
    }

    public function getUsers()
    {
        $users = User::all();
        return view('admin.manage-users')->with('data',$users);
    }
}
