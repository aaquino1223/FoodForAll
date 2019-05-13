<?php

namespace App\Http\Controllers;

use App\Associate;
use App\Follower;
use App\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $user = User::find($id);
        $associateType = Associate::where('RecipientId', $user->UserId)->where('RequesterId', auth()->user()->UserId)->first();
        $follower = Follower::where('UserId', $user->UserId)->where('FollowerId', auth()->user()->UserId)->first();
        return view('profile.followers', compact('user', 'associateType', 'follower'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        $recipient = User::find($id);
        $requester = auth()->user();
        $follower = new Follower;
        $follower->UserId = $recipient->UserId;
        $follower->FollowerId = $requester->UserId;
        $follower->FollowDate = date("Y-m-d H:i:s");
        $follower->save();
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
