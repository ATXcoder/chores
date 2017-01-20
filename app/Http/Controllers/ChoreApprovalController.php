<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_Chores_View;
use App\User_Chores;

use Illuminate\Support\Facades\Auth;

class ChoreApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get current user
        $user = User::find(Auth::id());

        //Grab all pending chores
        $chores = User_Chores_View::where('choreStatus_id','=',2)->get();

        //Show pending chores
        return view('chores.approve')->with('chores',$chores);
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
    public function update(Request $request)
    {
        //Grab the chore to update and update it
        $chore = User_Chores::find($request->chore_id);
        $chore->choreStatus_id = $request->chore_status;
        $chore->save();



        //Grab info on chore we just updated
        $newChore = User_Chores_View::find($request->chore_id);

        $updateChores = User_Chores_View::where('choreStatus_id','=',2)->get();

        $flashData=[
            'user' => $newChore->user_name,
            'chore' => $newChore->name,
            'status' => $request->status
        ];

        \Session::flash('choreData', $flashData);

        return view('chores.approve')->with('chores',$updateChores);
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
