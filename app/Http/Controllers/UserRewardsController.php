<?php

namespace App\Http\Controllers;

use App\Reward;
use App\User_Reward;
use App\User_Reward_View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRewardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRewards = User_Reward_View::all()->where('user_id','=',Auth::id());

        return view('user_rewards.index')->with('userRewards',$userRewards);
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
        //Get user
        $user = $request->user();

        //Get reward
        $reward = Reward::find($request->reward_id);

        //Get instance of User_Reward
        $userReward = User_Reward::create([
            'user_id' => $user->id,
            'reward_id' => $reward->id,
            'reward_used' => 0
        ]);

        return redirect()->action('UserRewardsController@index');

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
        //Mark reward as redeemed
        $user_reward = User_Reward::find($id);
        $user_reward->reward_used = 1;
        $user_reward->save();

        //Notify Admins
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
