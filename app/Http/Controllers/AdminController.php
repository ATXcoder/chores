<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Chore;
use App\User_Chores;

use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function choreAssignment()
    {
        //TODO Return users who have 'task_assignable' attribute
        $users = User::all()->where('is_admin','=',0)->pluck('name','id');

        $chores = Chore::pluck('name','id')->toArray();

        $data = [
            'users'=>$users,
            'chores'=>$chores
        ];

        return view('chores.assign')->with('data',$data);
    }

    public function assignChore(Request $request)
    {
        $userChore = new User_Chores;

        $userChore->user_id = $request->assignee;
        $userChore->chore_id = $request->chore;
        $userChore->due_date = $request->due;
        $userChore->complete = 0;
        $userChore->save();

        $users = User::all()->where('is_admin','=',0)->pluck('name','id');
        $chores = Chore::pluck('name','id')->toArray();
        $data = [
            'users'=>$users,
            'chores'=>$chores
        ];

        $assignedUser = User::find($request->assignee);
        $assignedChore = Chore::find($request->chore);
        $msg = [
            'user' => $assignedUser->name,
            'chore'=> $assignedChore->name
        ];

        //$request->session()->flash('chore', $msg);
        \Session::flash('chore', $msg);

        return view('chores.assign')->with('data',$data);
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
        $user = User::find($request->userID);
        if($user->avatar_uri != nullOrEmptyString())
        {
            //Convert string "storage/images/pic.jpg" into just "pic.jpg"
            $fileName = str_replace("storage/images/","",$user->avatar_uri);

            //New file path is now "storage/app/public/images/pic.jpg
            $filePath = "storage/app/public/images"."/".$fileName;

            //Set the full system path (i.e. C:\users\admin\...\pic.jpg
            $image_path = base_path().'/'.$filePath;

            //Convert all slashes to backslashes(\) - for Windows
            $image_path = str_replace("/","\\",$image_path);

            //Delete the file
            $fileDeleted = File::delete($image_path);

        }
        $path = "storage/".$request->image->store('images');
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->avatar_uri = $path;
        $user->save();

        \Session::flash('user', $request->name);

        return view('admin.edit-user')->with('data', $user);
    }


}
