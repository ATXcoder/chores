<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Notification;
use Illuminate\Http\Request;

use App\Chore;
use App\User;
use App\User_Chores;
use App\User_Chores_View;
use App\Notifications\ChoreUpdated;

use Illuminate\Support\Facades\Auth;

class UserChoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userChores = User_Chores_View::where('user_id','=',$user->id)
            ->where('choreStatus_id','!=',3)
            ->get();

        return (json_encode($userChores));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update the chore
        $chore = User_Chores::find($id);
        $chore->choreStatus_id = $request->newStatus;
        $chore->save();

        //Get the updated chore
        $updatedChore = User_Chores_View::find($id);

        //Send notification that chore has been updated
        $users = User::where('is_admin','=',1)->get();
        \Notification::send($users, new ChoreUpdated($updatedChore));

        return redirect()->action('UserChoresController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
