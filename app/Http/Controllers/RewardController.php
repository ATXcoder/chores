<?php

namespace App\Http\Controllers;

use App\User_Bank;
use Illuminate\Http\Request;
use App\Reward;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Showo all the rewards
        $rewards = Reward::all();

        return view('reward.index')->with('rewards',$rewards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reward.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reward = Reward::create([
            'name' => $request->name,
            'description'=> $request->description,
            'token_cost' => $request->token_cost,
            'active' => 1
        ]);

        return redirect()->action('RewardController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get the reward
        $reward = Reward::find($id);

        //Get the user's token balance
        $tokens = User_Bank::select('tokens')->where('user_id','=',Auth::id())->get();

        return view('reward.show')->with(['reward'=>$reward, 'tokens'=>$tokens]);
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
        //
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
