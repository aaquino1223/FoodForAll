<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\ViewRestrictionType;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ViewRestrictionTypes = ViewRestrictionType::orderBy('ViewRestrictionTypeId', 'DESC')->get();
        return $ViewRestrictionTypes->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->post('post');
        $user = auth()->user();
        $post = new Post;
        $post->Title = $postData['Title'];
        $post->Message = $postData['Message'];
        $post->PostTypeId = $postData['PostTypeId'];
        $post->ViewRestrictionTypeId = $postData['ViewRestrictionTypeId'];
        $post->UserId = $user->UserId;
        $post->PostDate = date("Y-m-d H:i:s");
        $post->save();

        return response()->json($post);
    }
}
