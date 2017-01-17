<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

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

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.edit-user')->with('data',$user);
    }

    public function saveUser(Request $request)
    {

        $path = "storage/".$request->image->store('images');

        $user = User::find($request->userID);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->avatar_uri = $path;
        $user->save();




    }
}
