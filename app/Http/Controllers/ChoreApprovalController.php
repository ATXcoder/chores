<?php

namespace App\Http\Controllers;

use App\Chore;
use App\User_Bank;
use Illuminate\Http\Request;
use App\User;
use App\User_Chores_View;
use App\User_Chores;
use App\Notifications\ChoreUpdated;

use Illuminate\Notifications\Notification;
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
        /*
         * Function to Approve/Reject chore
         * and award tokens if needed
         */

        //Grab the chore to update and update it
        $chore = User_Chores::find($request->chore_id);


        //Grab ID of person it's assigned to
        $choreOwnerID = $chore->user_id;


        //Mark chore complete only if it has been approved
        if($request->chore_status == 3)
        {
            $chore->complete = 1;
        }else
        {
            $chore->complete = 0;
        }

        //Update chore status (Active, Pending, etc...)
        $chore->choreStatus_id = $request->chore_status;
        //Update the chore
        $chore->save();

        //Grab info about the chore we just updated
        $choreDetails = Chore::find($chore->chore_id);

        //Add tokens if chore was approved
        if($request->chore_status == 3) //If chore was approved
        {
            //Get bank of user chore was assigned to
            $bank = User_Bank::where('user_id','=',$chore->user_id)->first();
            //Get current tokens in bank
            $currentTokens = $bank->tokens;
            //Get amount of tokens chore worth
            $newTokens = $choreDetails->token_value;
            //Add new tokens to current tokens
            $totalTokens = $currentTokens + $newTokens;
            //Update bank with new amount of tokens
            $bank->tokens = $totalTokens;
            //Save
            $bank->save();

            //Send out notification of tokens awarded
            $tmp = User_Chores_View::where("id",'=',$chore->id)->first();
            $users = User::where('is_admin','=',1)->get(); //Get all admins

            \Notification::send($users, new ChoreUpdated($tmp));
        }

        //Get all chores still pending - if any
        $updateChores = User_Chores_View::where('choreStatus_id','=',2)->get();



        //Banner message data
        $flashData=[
            'user' => $tmp->user_name,
            'chore' => $tmp->name,
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
