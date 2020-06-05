<?php

namespace App\Http\Controllers\Egresado;

use App\Friend;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roleName='egresado';

        $egresados = User::whereHas('roles', function ($query) use ($roleName) {
           $query->where('name', $roleName);
       })->get();

        return view('egresado.friends.index')->with('egresados',$egresados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->id);
        $friend = new Friend();
        $friend->user_id = $request->id; //en id$id viene el id del amigo
        $friend->save();
        
        $friend->friends->attach($request->id);
        return redirect()->route('egresado.friends.show', auth()->id() )->with('friend',$friend);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show( $user)
    {
        //
        $amigos= User::findOrFail($user)->friend;

        return view('egresado.friends.show')->with('amigos',$amigos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
