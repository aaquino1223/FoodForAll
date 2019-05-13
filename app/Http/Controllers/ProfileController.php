<?php

namespace App\Http\Controllers;

use App\Follower;
use App\Associate;
use Illuminate\Http\Request;
use App\User;
use App\Multimedia;
use App\UserMultimedia;
use \Illuminate\Contracts\Validation\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $posts = $user->posts()->orderBy('PostDate', 'DESC')->get();
        return view('profile.index', compact('posts', 'user'));
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
        $request->validate([
            'profileImage' => 'required|image',
        ]);

        $content = file_get_contents($request->profileImage);
        $multimedia = null;
        if (auth()->user()->UserMultimedia == null) {
            $multimedia = new Multimedia();
            $multimedia->MultiMediaTypeId = 1;
            $multimedia->Media = $content;
            $multimedia->MimeType = mime_content_type($request->profileImage->getPathName());
            $multimedia->save();

            $userMultimedia = new UserMultimedia();
            $userMultimedia->UserId = auth()->user()->UserId;
            $userMultimedia->MultimediaId = $multimedia->MultiMediaId;
            $userMultimedia->save();
        }
        else {
            $multimedia = auth()->user()->Multimedia;
            $multimedia->Media = $content;
            $multimedia->MimeType = $request->profileImage->type;
            $multimedia->save();
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::find($id);
        $posts = $user->posts()->orderBy('PostDate', 'DESC')->get();
        $association = Associate::where('RecipientId', $user->UserId)->where('RequesterId', auth()->user()->UserId)->first();
        if ($association == null) {
            $association = Associate::where('RequesterId', $user->UserId)->where('RecipientId', auth()->user()->UserId)->first();
        }
        $follower = Follower::where('UserId', $user->UserId)->where('FollowerId', auth()->user()->UserId)->first();
        return view('profile.index', compact('user', 'posts', 'association', 'follower'));
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
