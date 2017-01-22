<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chore;

class ChoreManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chores = Chore::all();
        return view('chores.manage')->with('chores',$chores);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
         * For updating a chore that already exist
         */
        $chore = Chore::find($id);
        $icon = $chore->icon_uri;
        return view('chores.edit')->with(['chore'=> $chore, 'icon'=>json_encode($icon)]);
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
        /*
         * For saving changes to a chore that already exist
         */
        $chore = Chore::find($id);
        $chore->name = $request->name;
        $chore->description = $request->description;
        $chore->icon_uri = $request->icon_uri;
        $chore->token_value = $request->token_value;

        if($request->exists('active'))
        {
            $chore->active = 1;
        }else{
            $chore->active = 0;
        }

        $chore->save();

        return redirect()->action('ChoreManagementController@index');

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
